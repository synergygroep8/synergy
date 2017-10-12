@extends ('layouts.master-dash')
@section('title')
    Hello World
@endsection
@section ('left-sidebar')
    @section ('left-bar-list')
        @include('includes.finance-left-bar')
        @include('includes.admin-left-bar')
    @endsection
@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="mainGroupHeading1">
            <h4 class="panel-title">
                <a href="#mainGroup1" class="btn-block" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="mainGroup1"> Invoices </a>
            </h4>
        </div>
    <div class="panel-collapse collapse in" role="tabpanel" id="mainGroup1" aria-labelledby="mainGroupHeading1" aria-expanded="true" style="">
        @include('includes.invoices')
    </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="mainGroupHeading2">
            <h4 class="panel-title">
                <a href="#mainGroup2" class="btn-block" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="mainGroup2"> Companies </a>
            </h4>
        </div>
    <div class="panel-collapse collapse in" role="tabpanel" id="mainGroup2" aria-labelledby="mainGroupHeading2" aria-expanded="true" style="">
        @include('customers.index')
    </div>
    </div>
@endsection
@section ('right-sidebar')

@endsection