@extends ('layouts.master')
@section ('title')
    Register
@endsection
@include('includes.message-block')
@section ('content')

    <form action="{{route('registerme')}}" method="post">
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
            <label for="department"></label>
            <select name="department" id="department" class="form-control">
                <option value="0">Admin</option>
                <option value="1">Finance</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Register" class="btn btn-primary">
        </div>
    </form>
@endsection