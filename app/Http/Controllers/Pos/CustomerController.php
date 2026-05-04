<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    //

    public function AllCustomer(){

        $customers = User::where('role', 'user')->latest()->get();
        return view('backend.customer.customer_all', compact('customers'));
    }
}
