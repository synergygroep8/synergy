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
        $customer = Customer::where('id', $id)->first();


        if (count($customer) <= 0)
        {
            return redirect('/customers/');
        }
        $count = 0;
        $profit = 0;
        $balance = 0;
        foreach ($customer->projects as $project)
        {
            $count = $count + $project->invoices->count();
            foreach ($project->invoices as $invoice)
            {
                if ($invoice->paid) {
                    $profit = $profit + $invoice->invoiceTotal;
                    $balance = $balance + $invoice->invoiceTotal;
                }
                else {
                    $balance = $balance - $invoice->invoiceTotal;
                }
            }
        }

        $customer->invoices = $count;
        $customer->profit = $profit;
        $customer->balance = $balance;
        $customer->save();

//        dd($customer);
        return view('customers.show', compact('customer', 'count', 'profit', 'balance'));
    }

    public function put(Request $request, $id   )
    {

        $this->validate($request,[

            'companyName'                   =>'required|max:191',
            'residence'                     =>'required|max:191',
            'adress'                        =>'required|max:191',
            'houseNumber'                   =>'required|max:9999|numeric',
            'zipCode'                       =>'required|max:191',
//            'phone1'                        =>'required|max:191|regex:/^\+?(\d{1,2}) ?(\d{3}) ?(\d{3}) ?(\d{3})$/',
            'phone1'                        =>'required|max:191',
            'email'                         =>'email|required|max:191',
            'contact'                       =>'required|max:191',
            'initals'                       =>'required|max:191',
            'bankaccountNumber'             =>'required|max:191|regex:/[A-Z]{2}\d{2} ?[A-Z]{4} ?\d{4} ?\d{4} ?[\d]{0,2}/'
        ]);

        $checkphone1 = $request->phone1;
        $checkphone1 = str_replace(" ", "", $checkphone1);
        $pattern = '/^\+?(\d{1,2})(\d{3})(\d{3})(\d{3})$/';
        $matches = array();
        preg_match($pattern, $checkphone1, $matches);

        dd($matches);

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

        $customer = Customer::where('id', $id)->first();

        if (count($customer) <= 0)
        {
            return redirect('/customers/');
        }

        return view('customers/edit')->with('customer', $customer);


    }

    private function updateCalculations() {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            $count = 0;
            $profit = 0;
            $balance = 0;
            foreach ($customer->projects as $project) {
                $count = $count + $project->invoices->count();
                foreach ($project->invoices as $invoice) {
                    if ($invoice->paid) {
                        $profit = $profit + $invoice->invoiceTotal;
                        $balance = $balance + $invoice->invoiceTotal;
                    } else {
                        $balance = $balance - $invoice->invoiceTotal;
                    }
                }
            }

            $customer->invoices = $count;
            $customer->profit = $profit;
            $customer->balance = $balance;
            $customer->save();
        }
    }

    public  function getCreate()
    {
        return view('customers.create');
    }

    public  function PostCreate(Request $request)
    {

        $this->validate($request,[

            'companyName'                   => 'required|max:191',
            'residence'                     =>'required|max:191',
            'adress'                        =>'required|max:191',
            'houseNumber'                   =>'required|numeric|max:9999',
            'zipCode'                       =>'required|max:191',
            'phone1'                        =>'required|max:191|regex:/^\+?(\d{1,2}) ?(\d{3}) ?(\d{3}) ?(\d{3})$/',
            'email'                         =>'email|required|max:191',
            'contact'                       =>'required|max:191',
            'initals'                       =>'required|max:191',
            'bankaccountNumber'             =>'required|max:191|regex:/[A-Z]{2}\d{2} ?[A-Z]{4} ?\d{4} ?\d{4} ?[\d]{0,2}/'
        ]);



            $customer                       = new Customer();

            $customer->companyName          = $request->companyName;
            $customer->residence1           = $request->residence;
            $customer->address1             = $request->adress;
            $customer->houseNumber1         = $request->houseNumber;
            $customer->zipCode1             = $request->zipCode;
            $customer->phone1               = $request->phone1;
            $customer->email                = $request->email;
            $customer->contactPerson        = $request->contact;
            $customer->initals              = $request->initals;
            $customer->bankaccountNumber    = $request->bankaccountNumber;

            $customer->save();





        return redirect()->route('customerdetail', $customer->id);
    }

}
