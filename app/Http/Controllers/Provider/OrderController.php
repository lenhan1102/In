<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Session;
use Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage', new Order)) {
            return response('Insufficient permissions', 401);
        }
        $orders = Order::where('id', '>', 0)->orderBy('id', 'desc')->get();
        if (count($orders)) {
            $orders->transform(function($order, $key){
                $order->cart = unserialize($order->cart);
                return $order;
            });
            //return $orders[1]->cart->items;
            return view('Provider.order.order_index', ['orders' => $orders]);
        } else {
            Session::flash('success', 'There is no orders!');
            return redirect()->route('index');
        }
        
    }

    public function edit($id){
        if (Gate::denies('manage', new Order)) {
            return response('Insufficient permissions', 401);
        }
        $order = Order::find($id);
        $order->status = 1- $order->status;
        $order->save();
        return redirect()->route('order.index');
    }

    public function destroy(Request $request)
    {
        if (Gate::denies('manage', new Order)) {
            return response('Insufficient permissions', 401);
        }
        $order = Order::find($request->input('id'));
        $order->delete();
        return redirect()->back();
    }
}
