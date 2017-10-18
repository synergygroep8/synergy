@extends ('layouts.master')
@section('content')
<form action="{{action('ProjectController@destroy', $project->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}

    <label for="none">Do you want to delete the <b>{{$project->name}}</b> project?</label>
    <div class="btn-group-lg">
    <input type="submit" name="none" value="Yes" class="btn btn-success">
    <a href="{{action('ProjectController@show', $project->id)}}" class="btn btn-danger">No</a>
    </div>
</form>

@endsection