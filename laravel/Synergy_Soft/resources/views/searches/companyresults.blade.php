@extends ('layouts.master-dash')

@section ('title')
@endsection

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on ID</h3>
        </div>
        <div class="panel body">
            @if (count($customerId) == 0)
                <p>There are no companies matching this id.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Total Projects</th>
                        <th>Total Invoices</th>
                    </tr>
                    @foreach($customerId as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->companyName}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                        @endforeach
                </table>
            @endif
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on name</h3>
        </div>
        <div class="panel body">
            @if (count($customerName) == 0)
                <p>There are no companies matching this name.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Total Projects</th>
                        <th>Total Invoices</th>
                    </tr>


                    @foreach ($customerName as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->companyName}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on address</h3>
        </div>
        <div class="panel body">
            @if (count($customerAddress) == 0)
                <p>There are no companies matching this address.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Total Projects</th>
                        <th>Total Invoices</th>
                    </tr>
                    @foreach ($customerAddress as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->companyName}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Companies based on residence</h3>
        </div>
        <div class="panel body">
            @if (count($customerCity) == 0)
                <p>There are no companies matching this residence.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Total Projects</th>
                        <th>Total Invoices</th>
                    </tr>


                    @foreach ($customerCity as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->companyName}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>

    <a class="btn button-brown" href="../customers">Back</a>
@endsection

<!--.panel.panel-default>.panel-heading>h3.panel-title^.panel.body>table.table.table-striped.table-hover>tr>th*4^tr>td*4-->