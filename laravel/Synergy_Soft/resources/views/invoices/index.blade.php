@extends ('layouts.master-dash')

@section ('mainbar')
    <a href="../">Back</a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Invoices from {{$invoices[0]->project->projectName}}</h2>
        </div>
        <div class="panel-body">
            <table class="table-hover table-striped table">
                <tr>
                    <th>Invoice Number</th>
                    <th>View</th>
                </tr>
            @foreach($invoices as $invoice)
                    <tr>
                        <td>{{$invoice->invoiceNr}}</td>
                        <td><a class="btn btn-info" href="{{action('InvoiceController@showFromProject', ['pid' => $invoice->pId, 'id' =>$invoice->id])}}">View</a></td>
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection