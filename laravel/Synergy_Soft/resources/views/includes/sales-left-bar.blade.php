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