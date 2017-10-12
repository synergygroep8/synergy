@extends ('layouts.master-dash')

@section ('title')
@endsection

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Users based on id</h3>
        </div>
        <div class="panel body">
            @if (count($userID) == 0)
                <p>There are no users matching this id.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    @foreach ($userID as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->username}}</td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                            <td><a class="btn btn-info" href="{{route('showuser', $item->id)}}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Users based on username</h3>
        </div>
        <div class="panel body">
            @if (count($userName) == 0)
                <p>There are no users matching this username.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>


                    @foreach ($userName as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->username}}</td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                            <td><a class="btn btn-info" href="{{route('showuser', $item->id)}}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>
@endsection

<!--.panel.panel-default>.panel-heading>h3.panel-title^.panel.body>table.table.table-striped.table-hover>tr>th*4^tr>td*4-->