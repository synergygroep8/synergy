@extends ('layouts.master')
@section ('title')
    Login
@endsection
@include('includes.message-block')
@section ('content')
    <div class="col-md-7">
    <form action="{{route('logmein')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{Request::old('username')}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{Request::old('password')}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
    </div>
    <div class="col-md-5">
        @include('users.help.login')
        @include('users.help.loginDutch')

    </div>
@endsection