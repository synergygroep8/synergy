<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#customermenu" aria-expanded="false" aria-controls="customermenu">
                Customers
            </a>
        </h4>
    </div>
    <div id="customermenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <ul class="remove-bullet">
                @if (Auth::user()->department == 0 || Auth::user()->department == 2)
                <li><a href="{{route('createcustomer')}}">Add customer</a></li>
                @endif
                <li><a href="{{route('dashboard')}}">Edit/remove customer</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
        <h4 class="panel-title">
            <a class="collapsed btn-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#projectmenu" aria-expanded="false" aria-controls="projectmenu">
                Project
            </a>
        </h4>
    </div>
    <div id="projectmenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
        <div class="panel-body">
            <ul class="remove-bullet">
                @if (Auth::user()->department == 0 || Auth::user()->department == 2)
                <li><a href="{{route('createProject')}}">Add project</a></li>
                @endif
                <li><a href="{{route('dashboard')}}">Edit/remove project</a></li>
            </ul>
        </div>
    </div>
</div>