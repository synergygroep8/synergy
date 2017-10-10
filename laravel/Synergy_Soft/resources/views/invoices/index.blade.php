@extends ('layouts.master-dash')

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Invoices from {{$invoices[0]->project->projectName}}</h3>
        </div>
        <div class="panel-body">

        </div>
    </div>
@endsection