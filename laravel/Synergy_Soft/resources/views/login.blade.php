@extends ('layouts.master')
@section ('title')
    Login
@endsection
@include('includes.message-block')
@section ('content')

    <form action="{{route('logmein')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
@endsection