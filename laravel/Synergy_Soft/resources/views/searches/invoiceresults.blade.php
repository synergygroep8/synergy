@extends ('layouts.master-dash')

@section ('title')
@endsection

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on invoice id</h3>
        </div>
        <div class="panel body">
            @if (count($customerInvoiceID) == 0)
                <p>There are no companies matching this invoice id.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>Invoice nr</th>
                        <th>Invoice ID</th>
                        <th>View</th>
                    </tr>
                        @foreach ($customerInvoiceID as $item)
                            <tr>
                                <td>{{$item->project->customer->id}}</td>
                                <td>{{$item->project->customer->companyName}}</td>
                                <td>{{$item->invoiceNr}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    <a role="button" href="/invoices/{{$item->id}}" class="btn btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on invoice number</h3>
        </div>
        <div class="panel body">
            @if (count($customerInvoiceNr) == 0)
                <p>There are no companies matching this residence.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>Invoice nr</th>
                        <th>Invoice ID</th>
                        <th>View</th>
                    </tr>


                    @foreach ($customerInvoiceNr as $item)
                        <tr>
                            <td>{{$item->project->customer->id}}</td>
                            <td>{{$item->project->customer->companyName}}</td>
                            <td>{{$item->invoiceNr}}</td>
                            <td>{{$item->id}}</td>
                            <td>
                                <a role="button" href="/invoices/{{$item->id}}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>
@endsection

<!--.panel.panel-default>.panel-heading>h3.panel-title^.panel.body>table.table.table-striped.table-hover>tr>th*4^tr>td*4-->