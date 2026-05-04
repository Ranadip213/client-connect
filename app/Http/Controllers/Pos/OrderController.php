<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //

    public function AllOrder()
    {
        $orders = Order::with(['user', 'category'])->latest()->get();

        return view('backend.order.order_all', compact('orders'));
    }
}
