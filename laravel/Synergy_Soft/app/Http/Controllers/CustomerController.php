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
//        $id = Input::get('id');
        $customer = Customer::find($id);



//        dd($customer);
        return view('customers.show', compact('customer'));
    }

    public function put(Request $request, $id   )
    {

        $this->validate($request,[

            'companyName'                   =>'required',
            'residence'                     =>'required',
            'adress'                        =>'required',
            'houseNumber'                   =>'required',
            'zipCode'                       =>'required',
            'phone1'                        =>'required',
            'email'                         =>'email|required',
            'contact'                       =>'required',
            'initals'                       =>'required',
            'bankaccountNumber'             =>'required'
        ]);

        $customer = Customer::find($id);

        $customer->companyName              = $request->companyName;
        $customer->residence1               = $request->residence;
        $customer->address1                 = $request->adress;
        $customer->houseNumber1             = $request->houseNumber;
        $customer->zipCode1                 = $request->zipCode;
        $customer->phone1                   = $request->phone1;
        $customer->email                    = $request->email;
        $customer->contactPerson            = $request->contact;
        $customer->initals                  = $request->initals;
        $customer->bankaccountNumber        = $request->bankaccountNumber;

        $customer->save();

        return redirect()->route('customerdetail',$id);


    }

    public function delete($id)
    {

    }

    public function edit($id)
    {

        $customer = Customer::find($id);

        return view('customers/edit')->with('customer', $customer);


    }
    public  function getCreate()
    {
        return view('customers.create');
    }

    public  function PostCreate(Request $request)
    {

        $this->validate($request,[

            'companyName'                   => 'unique:tbl_customers|required',
            'residence'                     =>'required',
            'adress'                        =>'required',
            'houseNumber'                   =>'required',
            'zipCode'                       =>'required',
            'phone1'                        =>'unique:tbl_customers|required',
            'email'                         =>'email|required',
            'contact'                       =>'required',
            'initals'                       =>'required',
            'bankaccountNumber'             =>'required'
        ]);
            $companyName                    = $request['companyName'];
            $residence                      = $request['residence'];
            $adress                         = $request['adress'];
            $houseNumber                    = $request['houseNumber'];
            $zipCode                        = $request['zipCode'];
            $phone1                         = $request['phone1'];
            $email                          = $request['email'];
            $contact                        = $request['contact'];
            $initals                        = $request['initals'];
            $bankaccountNumber              = $request['bankaccountNumber'];

            $customer                       = new Customer();

            $customer->companyName          = $companyName;
            $customer->residence1           = $residence;
            $customer->address1              = $adress;
            $customer->houseNumber1         = $houseNumber;
            $customer->zipCode1             = $zipCode;
            $customer->phone1               = $phone1;
            $customer->email                = $email;
            $customer->contactPerson        = $contact;
            $customer->initals              = $initals;
            $customer->bankaccountNumber    = $bankaccountNumber;

            $customer->save();






    }

}
