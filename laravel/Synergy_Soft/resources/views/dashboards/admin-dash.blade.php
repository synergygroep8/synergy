@extends ('layouts.master-dash')
@section('title')
    Admin Dashboard
@endsection
@section ('left-sidebar')
    @section ('left-bar-list')
        @include('includes.finance-left-bar')
        @include('includes.admin-left-bar')
    @endsection
@endsection
@section ('mainbar')

        @include('includes.invoices')
        @include('customers.index')
        @include('includes.users')
@endsection
@section ('right-sidebar')

@endsection