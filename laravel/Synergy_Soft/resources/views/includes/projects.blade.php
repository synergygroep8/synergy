<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="projectGroupHeading">
        <h4 class="panel-title">
            <a href="#projectGroup" class="btn-block" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="projectGroup"> Projects </a>
        </h4>
    </div>
    <div class="panel-collapse collapse" role="tabpanel" id="projectGroup" aria-labelledby="projectroupHeading" aria-expanded="true" style="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('searchproject')}}" class="input-group input-group-lg"><input type="text" placeholder="Project name, Project id, Company name, Company id" class="form-control input-lg" name="q"><span
                            class="input-group-btn">
            <button type="submit" class="btn button-brown btn-lg">Search</button>
            </span></form>
            </div>
            <div class="panel-body">
                <h3>Project list</h3>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Project name</th>
                        <th>Project id</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->projectName}}</td>
                            <td>{{$project->id}}</td>
                            <td><a class="btn btn-danger" href="{{action('ProjectController@verifyDelete', $project->id)}}">Delete</a></td>
                            <td><a class="btn btn-info" href="{{route('projectshow', $project->id)}}">View</a></td>
                        </tr>
                    @endforeach

                </table>
                {{$projects->links()}}
            </div>
        </div>
    </div>
</div>