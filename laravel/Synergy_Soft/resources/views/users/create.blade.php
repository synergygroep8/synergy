@extends ('layouts.master-dash')

@section ('title')

@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Create new User
            </h3>
        </div>
        <div class="panel body">
            <form action="{{route('storeUser')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option value=""></option>
                        <option value="0">Admin</option>
                        <option value="1">Finance</option>
                        <option value="2">Sales</option>
                        {{--<option value="3">Development</option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password2">Verify Password</label>
                    <input type="password" name="password2" id="password2" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Create User" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <a class="btn button-brown" href="../users">Back</a>
@endsection
@section('right-sidebar')

    @include('users.help.create')
    @include('users.help.createDutch')


@endsection