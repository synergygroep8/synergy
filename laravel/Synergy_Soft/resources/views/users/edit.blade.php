@extends ('layouts.master-dash')

@section ('title')
    Edit {{$user->username}}
@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Edit {{$user->username}}
            </h3>
        </div>
        <div class="panel body">
            <form action="{{route('putUser')}}" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required class="form-control" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" required class="form-control">
                        @if ($user->department == 0)
                            <option value="0" selected>Admin</option>
                        @else
                            <option value="0">Admin</option>
                        @endif
                        @if ($user->department == 1)
                            <option value="1" selected>Finance</option>
                        @else
                            <option value="1">Finance</option>
                        @endif
                        @if ($user->department == 2)
                            <option value="2" selected>Sales</option>
                        @else
                            <option value="2">Sales</option>
                        @endif
                        @if ($user->department == 3)
                            {{--<option value="3" selected>Development</option>--}}
                        @else
                            {{--<option value="3">Development</option>--}}
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password2">Verify Password</label>
                    <input type="password" name="password2" id="password2" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update User" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <a class="btn button-brown" href="/users/{{$user->id}}">Back</a>
@endsection

@section('right-sidebar')
@include('users.help.edit')
@include('users.help.editDutch')

@endsection