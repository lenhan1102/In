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

    public function deleteItem(Request $request)
    {
        $ids = $request->input('selected');
        $cart = Session::get('cart');
        $cart->delete($ids);
        Session::put('cart', $cart);

        return array('badge' => $cart->totalQty, 'total' => $cart->totalPrice);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Dish::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return $cart->totalQty;
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            Session::flash('success', 'Your cart is empty!');
            return redirect()->route('index');
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
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            $order->completeCheckout($cart);
            $order->cart = serialize($cart);
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

    public function getOrderHistory(){
        $orders = Auth::user()->orders;
        if (count($orders)) {
            $orders->transform(function($order, $key){
                $order->cart = unserialize($order->cart);
                return $order;
            });
            return view('User.order_history', ['orders' => $orders]);
        } else {
            Session::flash('success', 'You haven\'t ordered anything yet!');
            return redirect()->route('index');
        }
    }

    public function search(Request $request){
        
        $results = Dish::complexSearch(array(
            'body' => array(
                'query' => array(
                    'match' => array(
                        'description' => $request->key,
                        ),
                    ),
                'highlight' => array(
                    'fields' => array(
                        'description' => new \stdClass(),
                        
                        )
                    ),
                )
            ));
        $took = $results->took();
        $hits = $results->totalHits();
        $results = $results->paginate(count(Dish::all()));
        //dd($results);
        $dishes = [];
        for ($i=0; $i < count($results->hits["hits"]); $i++) { 
            $dishes[$i] = $results->hits['hits'][$i]['_source'];
            $dishes[$i]['description'] = $results->hits['hits'][$i]['highlight']['description'][0];
        }
        return view('User.results', ['dishes' => $dishes, 'hits' => $hits, 'took' => $took ]);
    }

    public function getProfile(){
        return view('User.profile', ['user' => Auth::user()]);
    }
    public function postProfile(Request $request){
        $this->validate($request, [
            'name' => 'max:255',
            'address' => '',
            'phone' => 'max:10',
            'gender' => '',
            'image' => 'image',
            ]);
        
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');

        if (!count($user->social_accounts)) {
            if ($request->file('image') != null) {
                $imageName = time().'-'.$request->file('image')->getClientOriginalName();
                $request->file('image')->move(base_path() . '/public/images/avatars/'.$user->id, $imageName);
                $user->avatar = $imageName;
            }
        }
        $user->save();
        Session::flash('success', 'Your profile is updated successfully!');
        return view('User.profile');
    }
}
