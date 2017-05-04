<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use App\Vote;
use App\User;
use App\Cart;
use App\Order;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use Session;
use Redirect;


class ActionController extends Controller
{
    public function vote(Request $request)
    {
        // update vote table
        preg_match('/star_([1-5]{1})/', $request->voted, $match);
        $voted = intval(substr($match[0], 5, 1));

        $line = Vote::where('user_id', Auth::user()->id)->where('dish_id', $request->dish_id)->first();
        if($line){
            $line->update([
                'voted' => $voted]);
        }else{
            Vote::create([
                'user_id' =>  Auth::user()->id,
                'dish_id' => $request->dish_id,
                'voted' => $voted
                ]);
        }
        Dish::find($request->dish_id)->update(['rating' => $this->updateRating($request->dish_id)]);
        
        return $voted;
    }

    public function updateRating(int $id){
        $votes = Dish::find($id)->votes;
        if (count($votes)) {
            $n = 0;
            foreach ($votes as $key => $value) {
                $n += $value->voted;
            }
            return $n/count($votes);
        } 
        return 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Request $request)
    {
        //
        $ids = $request->input('selected');
        $cart = Session::get('cart');
        $cart->delete($ids);
        Session::put('cart', $cart);

        return array('badge' => $cart->totalQty, 'total' => $cart->totalPrice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function addToCart(Request $request, $id)
    {
        $product = Dish::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return $cart->totalQty;
    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('User.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('User.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('User.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_Pqn9Y3b2AGEbtbLqXaTCGiVA');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice,
                "currency" => "vnd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('index')->with('success', 'Successfully purchased products!');
    }
    public function getCheckout(){
        if (!Session::has('cart')) {
            return view('User.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('User.checkout', ['total' => $total]);
    }

    public function getHistory(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('User.order_history', ['orders' => $orders]);
    }

    public function search(Request $request){
        $results = Dish::search($request->input('key'));
        return view('User.results', ['results' => $results, 'hits' => $results->totalHits() ]);
    }

    public function getProfile(){
        return view('User.profile', ['user' => Auth::user()]);
    }
    public function postProfile(){
        
    }
}
