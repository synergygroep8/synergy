@extends ('layouts.master-dash')

@section('title')
    Finance
@endsection

@section ('topbar')
    @include('includes.header')
@endsection

@section ('left-sidebar')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a href="{{route('dashboard')}}">
                        Home
                    </a>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accountmenu" aria-expanded="false" aria-controls="accountmenu">
                        {{Auth::user()->username}}
                    </a>
                </h4>
            </div>
            <div id="accountmenu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <ul class="remove-bullet">
                        <li><a href="{{route('logout')}}">Logout</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
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
                        <li><a href="#">Add customer</a></li>
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
    </div>
@endsection

@section ('mainbar')

@endsection

@section ('right-sidebar')

@endsection