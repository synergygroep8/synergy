@extends ('layouts.master-dash')

@section('title')

@endsection

@section('mainbar')


<div class="panel panel-default">
    <div class="panel-heading">
       <h3 class="panel-title"></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th>Company name</th>
                <td>{{$project->customer->companyName}}</td>
            </tr>
            <tr>
                <th>Project name</th>
                <td>{{$project->projectName}}</td>
            </tr>
            <tr>
                <th>Is Maintained</th>
                <td>
                    @if ($project->isMaintained)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
            <tr>
                <th>Software</th>
                <td>{{$project->software}}</td>
            </tr>
            <tr>
                <th>Hardware</th>
                <td>{{$project->hardware}}</td>
            </tr>
            <tr>
                <th>Operating system</th>
                <td>{{$project->OS}}</td>
            </tr>
            <tr>
                <th>Last contacted by</th>
                <td>{{$project->lastContact}}</td>
            </tr>
            <tr>
                <th>Last notes</th>
                <td>{{$project->contactClient}}</td>
            </tr>
            <tr>
                <th>Credit limit</th>
                <td>{{$project->creditLimit}}</td>
            </tr>
        </table>


        {{--hier mag ik een btn maken die linkt naar invoce (/projects/{id}/invoice)--}}

        @if (Auth::user()->department == 0 || Auth::user()->department == 1)
        <a class="btn button-brown" href="{{route('listInvoice',$project->id)}}">Invoices</a>
        @endif
        <a class="btn btn-warning" href="{{route('projectEdit',$project->id)}}">Edit</a>

        <a href="{{action('ProjectController@destroy', $project->id)}}" class="btn btn-danger">Delete</a>


    </div>
</div>
@endsection
@section('right-sidebar')
    @include('projects.help.show')
    @include('projects.help.showDutch')

@endsection
