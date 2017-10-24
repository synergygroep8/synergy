@extends ('layouts.master-dash')
@section('title')
    Admin Dashboard
@endsection
@section ('left-bar-list')
    @include('includes.finance-left-bar')
    @include('includes.admin-left-bar')
@endsection
@section ('mainbar')
    @include('includes.invoices')
    @include('customers.index')
    @include('includes.users')
    @include('includes.projects')
@endsection
@section ('right-sidebar')
    @include('invoices.help.widget')
    @include('customers.help.widget')
    @include('users.help.widget')
    @include('projects.help.widget')

    @include('invoices.help.widgetDutch')
    @include('customers.help.widgetDutch')
    @include('users.help.widgetDutch')
    @include('projects.help.widgetDutch')
@endsection