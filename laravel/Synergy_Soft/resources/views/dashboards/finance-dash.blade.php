@extends ('layouts.master-dash')

@section('title')
    Finance Dashboard
@endsection

@section ('mainbar')
    @include ('includes.invoices')
    @include ('customers.index')
    @include('includes.projects')
@endsection

@section ('right-sidebar')
    @include ('invoices.help.widget')
    @include ('customers.help.widget')
    @include ('projects.help.widget')
@endsection