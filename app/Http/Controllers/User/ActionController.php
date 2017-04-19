<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dish;
use Session;
use Redirect;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        foreach ($ids as $id) {
            # code...
            unset($cart[$id]);
        }
        Session::put('cart', $cart);
        $this->updateBadge();
        return Session::get('badge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Session::has('k')) {
            # code...
            echo 'co k';
            Session::put('k',  Session::get('k') + 1);
            echo Session::get('k');
        } else {
            echo 'khong co, gio them';
            Session::put('k', 1);
        }
    }

    public function addToCart(Request $request, $id)
    {
        // cart is an array ['id' => 'quantity']
        if (!Session::has('cart')) {           
            $cart = array();
            $cart[$id] = 0;
            Session::put('cart', $cart);
        }
        $cart = Session::get('cart');
        if (!array_key_exists($id, $cart)) {
            $cart[$id] = 0;
        }
        $cart[$id] += 1;
        Session::put('cart', $cart);

        // badge
        $this->updateBadge();
        return Session::get('badge');
    }

    public function cart()
    {
        $carts = Session::get('cart');
        return view('User.cart',['carts' => $carts]);
    }
    public function updateBadge(){
        $badge = 0;
        if (Session::has('cart')) {
            $carts = Session::get('cart');
            foreach ($carts as $key => $value) {
                $badge += $value;
            }
        }
        Session::put('badge', $badge);
        return $badge;
    }
}
