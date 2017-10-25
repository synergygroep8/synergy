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
        $project = Project::find($id);

        return view ('invoices.index', compact('invoices', 'project'));
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.show', compact('invoice'));
    }

    public function showFromProject($pid, $id)
    {

        $invoice = Invoice::where('id', $id)->where('pId', $pid)->first();
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
            $invoices = Invoice::all();

            return view('invoices.list', compact('invoices'));
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
        $project = new Project();
        $project = Project::find($id);
        if ($project->customer->id != $customerId || $project->id != $projectId)
        {
            return redirect()->back();
        }
        if ($invoiceTotal < 0)
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

        $unpaidInvoices = Invoice::where('paid', 0)->where('pId', $projectId)->sum('invoiceTotal');
        if ($project->creditLimit < $unpaidInvoices) {
            $project->isMaintained = 0;
        }
        else {
            $project->isMaintained = 1;
        }
        $project->save();


        return redirect()->route('listInvoice', $project->id);
    }

    public function edit($pid, $id)
    {

        $invoice = Invoice::find($id);
//        dd($invoice);

        return view('invoices.edit', compact('invoice', 'project'));
    }

    public function put(Request $request, $pid, $id)
    {

        $invoice = Invoice::find($id);
        $project = Project::find($pid);

        $this->validate($request, [
            'customerId' => 'required',
            'projectId' => 'required',
            'invoiceNr' => 'required',
            'date' => 'required|date',
            'invoiceTotal' => 'required|max:999999999|numeric',
            'description' => 'required',
            'ledgerNumber' => 'required'
        ]);
//        dd($request);
        if (count(Invoice::where('invoiceNr',$request->invoiceNr)->get()) > 1)
        {
            return response('Forbidden', 403);
        }

        if ($invoice->project->customer->id != $request->customerId || $invoice->project->id != $request->projectId || $invoice->project->id != $project->id)
        {
            return redirect()->back();
        }

        if ($request->invoiceTotal < 0)
        {
            return redirect()->back();
        }


//        if ($request->paid == 'on')
//        {
//            $paid = 1;
//        }
//        else {
//            $paid = 0;
//        }


        $invoice->pId = $request->projectId;
        $invoice->invoiceNr = $request->invoiceNr;
        $invoice->date = $request->date;
        $invoice->BTW = '21.0';
        $invoice->invoiceTotal = $request->invoiceTotal;
        $invoice->paid = $request->paid;
        $invoice->description = $request->description;
        $invoice->ledgerNumber = $request->ledgerNumber;

        $invoice->save();
        $project = Project::find($request->projectId);
        $unpaidInvoices = Invoice::where('paid', 0)->where('pId', $request->projectId)->sum('invoiceTotal');
        if ($project->creditLimit < $unpaidInvoices) {
            $project->isMaintained = 0;
        }
        else {
            $project->isMaintained = 1;
        }
        $project->save();

        return redirect()->route('invoiceprojectshow', ['pid' => $invoice->project->id, 'id' => $invoice->id]);
//        return back();
    }

    public function verifyDelete($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.verifyDelete', compact('invoice'));
    }


    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect()->route('dashboard');
    }
}
