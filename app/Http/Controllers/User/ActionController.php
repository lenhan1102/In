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
    public function update(Request $request, $id)
    {
        //
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
        //
        //Session::flush();
        //$request->session()->flush();
        
        if (!Session::has('cart')) {
            $cart = array();
            $dishes = Dish::all();
            foreach ($dishes as $dish) { 
                # code...
               $cart[$dish->id] = 0;
            }
            //dd($cart);
            Session::put('cart', $cart);
        }

        $arr = Session::get('cart');

        $arr[$id] += 1;
        //echo '60: '.$arr[$id];   
        Session::put('cart', $arr);
        return Redirect::back();
    }
}
