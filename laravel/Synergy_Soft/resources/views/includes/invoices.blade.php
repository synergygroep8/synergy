{{$customersearch = ""}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h1>
            <!--<form action="{{route('customers', $customersearch)}}" method="post">
                <div class="col-lg">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control input-lg" name="id" id="customersearch" placeholder="Customer id, Company name">
                        <span class="input-group-btn">
                            <input class="btn btn-default btn-lg" type="submit" onclick="">Search</input>
                        </span>
                    </div>
                </div>
            </form>-->
                <form  action="{{route('search')}}" method="get">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control input-lg" name="q" placeholder="Company id, Company Name"/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="submit">Search</button>
                        </span>
                    </div>
                </form>
        </h1>
    </div>
    <div class="panel-body">
        <h3>Open invoices</h3>
        <table class="table table-striped">
            <tr>
                <th>Company name</th>
                <th>Projects</th>
                <th>Unpaid amount</th>
                <th>View</th>
            </tr>
            @foreach($openInvoices as $openInvoice)
                <tr>
                    <td>{{$openInvoice->project->customer->companyName}}</td>
                    <td>{{count($openInvoice->project())}}</td>
                    <td></td>
                    <td><a href="#">View</a></td>
                </tr>
            @endforeach
        </table>
        <h3>No open invoices</h3>
        <table class="table table-striped">
            <tr>
                <th>Company name</th>
                <th>Projects</th>
                <th>Unpaid invoices</th>
                <th>View</th>
            </tr>
            @foreach($closedInvoices as $closedInvoice)
                <tr>
                    <td>{{$closedInvoice->project->customer->companyName}}</td>
                    <td>{{count($closedInvoice->project())}}</td>
                    <td></td>
                    <td><a href="#">View</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>