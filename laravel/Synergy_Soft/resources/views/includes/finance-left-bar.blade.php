<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#customermenu" aria-expanded="false" aria-controls="customermenu">
                Customers
            </a>
        </h4>
    </div>
    <div id="customermenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <ul class="remove-bullet">
                <li><a href="{{route('createcustomer')}}">Add customer</a></li>
                <li><a href="#">Edit/remove customer</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#invoicemenu" aria-expanded="false" aria-controls="invoicemenu">
                Invoices
            </a>
        </h4>
    </div>
    <div id="invoicemenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <ul class="remove-bullet">
                <li><a href="#">View/edit invoices</a></li>
                <li><a href="#">Add invoice</a></li>
            </ul>
        </div>
    </div>
</div>