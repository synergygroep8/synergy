@extends ('layouts.master-dash')

@section('title')
    Finance
@endsection

@section ('mainbar')
    @include ('includes.invoices')
    @include ('customers.index')
@endsection

@section ('right-sidebar')

@endsection