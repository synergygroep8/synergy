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
    @include('includes.invoices')
@endsection

@section ('right-sidebar')

@endsection