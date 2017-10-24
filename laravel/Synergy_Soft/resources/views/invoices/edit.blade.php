@extends ('layouts.master-dash')

@section ('title')
    Edit an Invoice
@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit an invoice</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('putInvoice', ['pid' => $invoice->project->id, 'id' => $invoice->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="customerId" value="{{$invoice->project->customer->id}}" readonly required>
                <input type="hidden" name="projectId" value="{{$invoice->project->id}}" readonly required>
                <div class="form-group">
                    <label for="invoiceNr">Invoice Number</label>
                    <input name="invoiceNr" id="invoiceNr" type="text" value="{{$invoice->invoiceNr}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input name="date" id="date" type="date" class="form-control" value="{{$invoice->date}}" required>
                </div>
                <div class="form-group">
                    <label for="invoiceTotal">Invoice Total</label>
                    <input type="number" step=".01" name="invoiceTotal" value="{{$invoice->invoiceTotal}}" id="invoiceTotal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paid">Paid</label>
{{--                    <input type="checkbox" name="paid" checked="{{$invoice->paid}}" id="paid" class="form-control">--}}
                    <select name="paid" id="paid" class="form-control">
                        @if ($invoice->paid == 0)
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                        @else
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="{{$invoice->description}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ledgerNumber">LedgerNumber</label>
                    <input type="text" id="ledgerNumber" name="ledgerNumber" value="{{$invoice->ledgerNumber}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
@section ('right-sidebar')
    @include ('invoices.help.edit')
    @include ('invoices.help.editDutch')
@endsection