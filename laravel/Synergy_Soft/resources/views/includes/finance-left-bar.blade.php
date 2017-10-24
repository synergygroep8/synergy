<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#invoicemenu" aria-expanded="false" aria-controls="invoicemenu">
                Invoices
            </a>
        </h4>
    </div>
    <div id="invoicemenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
            <ul class="remove-bullet">
                <li><a href="{{route('dashboard')}}">View/edit invoices</a></li>
                {{--<li><a href="">Add invoice</a></li>--}}
            </ul>
        </div>
    </div>
</div>