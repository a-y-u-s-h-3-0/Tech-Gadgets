<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $data=Order::where('status','>=',1)->get();

            $user=Person::get();
            $product=Product::get();
            $data=Order::where('status','>=',1)->latest()->paginate(6);
    
            return view('order',compact('data','user','product'));

    }

    public function status($id) {
        $order=Order::find($id);
        $order->status=$order->status+1;
        $order->save();

        return redirect('/order');
}
}
