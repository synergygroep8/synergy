@extends ('layouts.master-dash')

@section ('title')

@endsection
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                User {{$user->username}}
            </h3>
        </div>
        <div class="panel body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>User ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>
                    <?php
                    switch ($user->department)
                    {
                        case 0:
                            echo "Admin";
                            break;
                        case 1:
                            echo "Finance";
                            break;
                        case 2:
                            echo "Sales";
                            break;
                        case 3:
                            echo "Development";
                            break;
                        default:
                            echo "Not defined";
                            break;
                    }
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <a class="btn btn-warning" href="{{route('editUser', $user->id)}}">Edit</a>
    <a class="btn button-brown" href="../users">Back</a>
@endsection

@section('right-sidebar')

@include('users.help.view')
@include('users.help.viewDutch')


@endsection
