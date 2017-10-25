@extends ('layouts.master-dash')

@section ('title')
    Invoice {{$invoice->invoiceNr}} for {{$invoice->project->projectName}}
@endsection

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Invoice {{$invoice->invoiceNr}}
            </h3>
        </div>
        <div class="panel body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Invoice ID</th>
                    <td>{{$invoice->id}}</td>
                </tr>
                <tr>
                    <th>Invoice Nr</th>
                    <td>{{$invoice->invoiceNr}}</td>
                </tr>
                <tr>
                    <th>Project Name</th>
                    <td>{{$invoice->project->projectName}}</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>{{$invoice->project->customer->companyName}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{$invoice->date}}</td>
                </tr>
                <tr>
                    <th>Invoice Total</th>
                    <td>{{$invoice->invoiceTotal}}</td>
                </tr>
                <tr>
                    <th>Paid</th>
                    @if ($invoice->paid)
                    <td class="alert-success">
                        Yes
                        @else
                    <td class="alert-danger">
                        No
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$invoice->description}}</td>
                </tr>
                <tr>
                    <th>BTW</th>
                    <td>{{$invoice->BTW}}</td>
                </tr>
                <tr>
                    <th>LedgerNumber</th>
                    <td>{{$invoice->ledgerNumber}}</td>
                </tr>
            </table>
        </div>
    </div>

    <a class="btn button-brown" href="../invoices">Back</a>
    @if (Auth::user()->department == 0 || Auth::user()->department == 1)
    <a class="btn btn-warning" href="{{route('editInvoice', ['pid' => $invoice->project->id, 'id' => $invoice->id])}}">Edit</a>
    @endif
    <a href="{{action('InvoiceController@verifyDelete', $invoice->id)}}" class="btn btn-danger">Delete</a>
@endsection

@section('right-sidebar')
    @include('invoices.help.show')
    @include('invoices.help.showDutch')
@endsection