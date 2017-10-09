<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class CustomerController extends Controller
{
    //

    public function search()
    {
        //get keywords input for search
        $keyword=  Input::get('q');

        //search that student in Database
        try {
            $customer = Customer::where('id', $keyword)->get();
            if (count($customer) == 0)
                throw new \ErrorException();
        }
        catch (\Exception $ex)
        {
            //dd($ex);
            $customer = Customer::where('companyName', $keyword)->get();
        }
        if (count($customer) == 0)
        {
            $messageB = "Company not found";
            return redirect()->back()->with(['messageB' => $messageB]);
        }
        //$customer->first();
        $customer = $customer[0];

        //return display search result to user by using a view
        return view('customers.show', compact('customer'));
    }

    public function searchCompany()
    {
        $keyword = Input::get('q');
        if ($keyword == "")
        {
            return redirect()->back();
        }
        $customerId = array();
        $customerName = array();
        $customerAddress = array();
        $customerCity = array();
        try {
            $keyword = '%' . $keyword . '%';
            $customerId = Customer::where('id', 'like', $keyword)->get();
            //if (count($customerId) == 0)
                throw new \Exception();
        } catch (\Exception $e1) {
            try {
                $customerCity = Customer::where('residence1', 'like', $keyword)->get();
                throw new \Exception();
            } catch (\Exception $e4)
            {
                try {
                    $customerName = Customer::where('companyName', 'like', $keyword)->get();
                    throw new \Exception();
                } catch (\Exception $e5) {
                    try {
                        $customerAddress = Customer::where('address1', 'like', $keyword)->get();

                    } catch (\Exception $e6)
                    {

                    }
                }
            }
        }



        return view('searches.companyresults', compact('customerId', 'customerName', 'customerAddress', 'customerCity'));
    }

    public function show($id)
    {
        $id = Input::get('id');
        $customer = Customer::find($id);

        //dd($customer);
        return view('customers.show', compact('customer', 'columns'));
    }

    public function store()
    {

    }

    public function delete($id)
    {

    }

    public function edit($id)
    {

    }


}
