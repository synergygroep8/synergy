@extends ('layouts.master')
@section('content')
<form action="{{action('UserController@destroy', $user->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}

    <label for="none">Do you want to delete the user <b>{{$user->username}}</b>?</label>
    <div class="btn-group-lg">
    <input type="submit" name="none" value="Yes" class="btn btn-success">
    <a href="{{action('UserController@show', $user->id)}}" class="btn btn-danger">No</a>
    </div>
</form>

@endsection