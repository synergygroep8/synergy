@extends ('layouts.master-dash')

@section ('title')
    Create new Invoice
@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create a new invoice</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('createInvoice', $project->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="customerId" value="{{$project->customer->id}}" readonly required>
                <input type="hidden" name="projectId" value="{{$project->id}}" readonly required>
                <div class="form-group">
                    <label for="invoiceNr">Invoice Number</label>
                    <input name="invoiceNr" id="invoiceNr" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input name="date" id="date" type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="invoiceTotal">Invoice Total</label>
                    <input type="number" name="invoiceTotal" id="invoiceTotal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="paid">Paid</label>
                    <select name="paid" id="paid" class="form-control" required>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ledgerNumber">LedgerNumber</label>
                    <input type="text" id="ledgerNumber" name="ledgerNumber" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('right-sidebar')
    @include('invoices.help.create')
    @include('invoices.help.createDutch')

@endsection