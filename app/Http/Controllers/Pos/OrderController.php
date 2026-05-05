<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Message;

class OrderController extends Controller
{
    //

    public function AllOrder()
    {
        $orders = Order::with(['user', 'category'])->latest()->get();

        return view('backend.order.order_all', compact('orders'));
    }

    public function ApproveOrder($id)
    {

        $order = Order::findOrFail($id);

        $order->status = 'approved';

        $order->save();

        return redirect()->route('all.order')->with('success', 'Order Approved');

    }

    public function RejectOrder($id)
    {

        $order = Order::findOrFail($id);

        $order->status = 'rejected';

        $order->save();

        return redirect()->route('all.order')->with('success', 'Order Rejected');

    }

    public function ChatPage($id)
    {
        $order = Order::with(['user', 'messages.user'])->findOrFail($id);

        if ($order->status != 'approved') {
            return redirect()->back()->with('error', 'Chat not allowed');
        }

        return view('backend.chat.chat_view', compact('order'));
    }

    public function ChatList()
    {
        $orders = Order::with(['user', 'category'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('backend.chat.chat_list', compact('orders'));
    }

    public function SendMessage(Request $request)
    {

        Message::create([

            'order_id' => $request->order_id,

            'sender_id' => auth()->id(),

            'message' => $request->message

        ]);

        return back()->with('success', 'Message sent successfully');

    }
}
