<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#usermangagemenu" aria-expanded="false" aria-controls="usermangagemenu">
                User Management
            </a>
        </h4>
    </div>
    <div id="usermangagemenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <ul class="remove-bullet">
                <li><a href="#">Add User</a></li>
                <!--<li><a href="#">Edit/remove customer</a></li>-->
            </ul>
        </div>
    </div>
</div>
@if (1==10)
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
    @endif