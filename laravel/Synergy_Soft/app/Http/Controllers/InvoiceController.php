<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $invoices = Invoice::all();
        return view ('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.show', compact('invoice'));
    }

    public function searchInvoice()
    {
        $keyword = Input::get('q');
        if ($keyword == "")
        {
            return redirect()->back();
        }
        $customerInvoiceID = array();
        $customerInvoiceNr = array();

        try {
            //$customerInvoiceID = Invoice::where('id', 'like', $keyword)->groupBy(Invoice::project()->customer()->id)->get();
            $customerInvoiceID = Invoice::where('id', 'like', $keyword)->get();
            //dd($customerInvoiceID);
            throw new \Exception();

        } catch (\Exception $e1) {
            try {
                $keyword = '%' . $keyword . '%';
                $customerInvoiceNr = Invoice::where('invoiceNr', 'like', $keyword)->get();
                throw new \Exception();
            } catch (\Exception $e2) {
            }
        }

        return view('searches.invoiceresults', compact('customerInvoiceID', 'customerInvoiceNr'));
    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {

    }
}
