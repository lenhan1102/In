<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('id', '>', 0)->orderBy('id', 'desc')->get();
        if (count($orders)) {
            $orders->transform(function($order, $key){
                $order->cart = unserialize($order->cart);
                return $order;
            });
            return view('User.order_history', ['orders' => $orders]);
        } else {
            Session::flash('success', 'There is no orders!');
            return redirect()->route('index');
        }
        return view('Admin.order.index', ['orders' => $orders]);
    }

    public function setSuccess(Request $request){
        $order = Order::find($request->id);
        $order->status = !$order->status;
        $order->save();
        return redirect()->route('order.index');
    }

    public function destroy(Request $request)
    {
        $order = Order::find($request->input('id'));
        $order->delete();
        return redirect()->back();
    }
}
