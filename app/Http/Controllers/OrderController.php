<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders= Order::select('id','the_order','name', 'email' , 'country' , 'city' , 'phone' ,'adress' ,'shipping')
        ->orderBy('id','DESC')
        ->paginate(3);

        return view('orders.index',[
            'orders' => $orders
        ]);
    }

    public function destroy( $orderId){
       
        
        Order::findOrFail($orderId)->delete();
        return redirect(url('/orders'));
    }
    
    
}
