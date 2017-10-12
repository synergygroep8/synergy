<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="userGroupHeading">
        <h4 class="panel-title">
            <a href="#userGroup" class="btn-block" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="userGroup"> Users </a>
        </h4>
    </div>
    <div class="panel-collapse collapse" role="tabpanel" id="userGroup" aria-labelledby="userGroupHeading" aria-expanded="true" style="">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('searchuser')}}" class="input-group input-group-lg"><input type="text" placeholder="Company name, Company id, Address, Residence" class="form-control input-lg" name="q"><span
                            class="input-group-btn">
            <button type="submit" class="btn button-brown btn-lg">Search</button>
            </span></form>
            </div>
            <div class="panel-body">
                <h3>User list</h3>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Username</th>
                        <th>Department</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
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
                            <td><a class="btn btn-danger" href="#">Delete</a></td>
                            <td><a class="btn btn-info" href="{{route('showuser', $user->id)}}">View</a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>