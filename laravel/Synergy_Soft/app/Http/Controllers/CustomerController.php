<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomerController extends Controller
{
    //

    public function show($id)
    {
        $customer = Customer::find($id);

        //dd($customer);
        return view('customers.show', compact('customer', 'columns'));
    }
}
