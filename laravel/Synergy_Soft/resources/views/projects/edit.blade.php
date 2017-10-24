@extends ('layouts.master-dash')

@section('title')

@endsection

@section('mainbar')

    {{--Form maken--}}

    <form action="{{route('ProjectPut',$project->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="form-group">
            <label for="projectName">The name of the project?</label>
            <input class="form-control" type="text" name="projectName" value="{{$project->projectName}}" placeholder="Name of the Project">
        </div>


        <div class="form-group">
            <label for="software">Needed software for the project?</label>
            <textarea class="form-control"  name="software" placeholder="List of the needed software">{{$project->software}}</textarea>
        </div>
        <div class="form-group">
            <label for="software">Needed hardware for the project?</label>
            <textarea class="form-control"  name="hardware" placeholder="List of the needed hardware">{{$project->hardware}}</textarea>
        </div>
        <div class="form-group">
            <label for="OS">Used Operating system for the project?</label>
            <input class="form-control" type="text" name="OS" value="{{$project->OS}}" placeholder="Name of Operating system">
        </div>
        <div class="form-group">
            <label for="lastContact">Last contacted person (als laatse contact heeft gehad)</label>
            <input class="form-control" type="text" name="lastContact" placeholder="Name of the last contact peron">
        </div>

        <div class="form-group">
            <label for="contactClient">Made agreements</label>
            <textarea class="form-control"  name="contactClient" placeholder="List of the agreements that have been made">{{$project->contactClient}}</textarea>
        </div>

        <div class="form-group">
            <label for="creditLimit">The limit of clients project credit</label>
            <input class="form-control" type="number" value="{{$project->creditLimit}}" name="creditLimit" placeholder="&euro;">
        </div>

        <div class="form-group">
            <label for="isMaintained">is the project maintained?</label>
            <input class="form-control" type="checkbox" checked="{{$project->IsMaintained}}" name="isMaintained" placeholder="">
        </div>
        <div class="form-group">
            <input type="submit" class="btn button-brown">
        </div>


    </form>

@endsection

@section('right-sidebar')
    @include('projects.help.edit')
    @include('projects.help.editDutch')

@endsection


