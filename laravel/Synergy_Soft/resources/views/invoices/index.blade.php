@extends ('layouts.master-dash')
@section('title')
    Invoices from {{$project->projectName}}
@endsection
@section ('mainbar')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Invoices from {{$project->projectName}}</h2>
        </div>
        <div class="panel-body">
            <table class="table-hover table-striped table">
                @if (count($invoices) > 0)
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
                    @else
                <tr>There are no invoices for this project</tr>
                    @endif
            </table>
            @if (Auth::user()->department == 0 || Auth::user()->department == 1)
            <a href="{{action('InvoiceController@getCreate', $project->id)}}" class="btn btn-success">Create Invoice</a>
            @endif
            <a class="btn button-brown" href="{{route('projectshow',$project->id)}}">Back</a>
        </div>
    </div>
@endsection