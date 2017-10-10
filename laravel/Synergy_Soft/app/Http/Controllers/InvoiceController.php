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

    public function projectIndex($id)
    {
        $invoices = Invoice::where('pId', $id)->get();

        return view ('invoices.index', compact('invoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.show', compact('invoice'));
    }

    public function getCreate($id)
    {
        $project = Project::find($id);
        return view('invoices.create', compact('project'));
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

    public function store($id, Request $request)
    {
        $this->validate($request, [
            'customerId' => 'required',
            'projectId' => 'required',
            'invoiceNr' => 'required',
            'date' => 'required',
            'invoiceTotal' => 'required',
            'paid' => 'required',
            'description' => 'required',
            'ledgerNumber' => 'required'
        ]);
        $customerId = $request['customerId'];
        $projectId = $request['projectId'];

        $invoiceNr = $request['invoiceNr'];
        $date = $request['date'];
        $invoiceTotal = $request['invoiceTotal'];
        $paid = $request['paid'];
        $description = $request['description'];
        $ledgerNumber = $request['ledgerNumber'];

        $project = Project::find($id);
        if ($project->customer->id != $customerId || $project->id != $projectId)
        {
            return redirect()->back();
        }

        $invoice = new Invoice();

        $invoice->pId = $projectId;
        $invoice->invoiceNr = $invoiceNr;
        $invoice->date = $date;
        $invoice->BTW = '21.0';
        $invoice->invoiceTotal = $invoiceTotal;
        $invoice->paid = $paid;
        $invoice->description = $description;
        $invoice->ledgerNumber = $ledgerNumber;

        $invoice->save();
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {

    }
}
