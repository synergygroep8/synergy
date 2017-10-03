@extends ('layouts.master-dash')

@section('title')
    Finance
@endsection



@section ('left-sidebar')
    @section ('left-bar-list')
        @include('includes.finance-left-bar')
    @endsection
@endsection

@section ('mainbar')
    @include ('includes.invoices')
@endsection

@section ('right-sidebar')

@endsection