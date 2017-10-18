@extends ('layouts.master-dash')

@section('title')
    sales
@endsection

@section('mainbar')

@include('customers.index')
@include('includes.projects')
@endsection

@section('right-sidebar')
    @include ('customers.help.widget')
    @include ('projects.help.widget')
@endsection