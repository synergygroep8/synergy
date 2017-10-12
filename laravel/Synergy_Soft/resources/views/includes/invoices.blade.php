{{$customersearch = ""}}
{{--.panel.panel-default>.panel-heading>form.input-group.input-group-lg>input.form-control.input-lg+span.input-group-btn>button.btn.button-brown.btn-lg--}}
{{--.panel-body>h3+table.table.table-hover.table-striped>tr>th*4^tr>td*4--}}
<div class="panel panel-default">
    <div class="panel-heading">
            <!--<form action="route('customerdetail', $customersearch)}}" method="post">
                <div class="col-lg">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control input-lg" name="id" id="customersearch" placeholder="Customer id, Company name">
                        <span class="input-group-btn">
                            <input class="btn btn-default btn-lg" type="submit" onclick="">Search</input>
                        </span>
                    </div>
                </div>
            </form>-->
                <form  action="{{route('searchinvoice')}}" method="get">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control input-lg" name="q" placeholder="Invoice id, invoice nr"/>
                        <span class="input-group-btn">
                            <button class="btn button-brown btn-lg" type="submit">Search</button>
                        </span>
                    </div>
                </form>
    </div>
    <div class="panel-body">
        <h3>Open invoices</h3>
        <table class="table table-striped">
            @if (count($openInvoices) > 0)
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
                    <td><a class="btn button-brown" href="/invoices/{{$openInvoice->id}}">View</a></td>
                </tr>
            @endforeach
            @else
                <tr>
                    There are no open invoices
                </tr>
            @endif
        </table>
        <h3>Closed invoices</h3>
        <table class="table table-striped">
            @if (count($closedInvoices))
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
                    <td><a class="btn button-brown" href="/invoices/{{$closedInvoice->id}}">View</a></td>
                </tr>
            @endforeach
            @else
                <tr>
                    There are no closed invoices
                </tr>
            @endif
        </table>
    </div>
</div>