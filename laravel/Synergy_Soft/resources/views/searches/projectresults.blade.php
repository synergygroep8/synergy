@extends ('layouts.master-dash')

@section ('title')
@endsection

@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Projects based on project id</h3>
        </div>
        <div class="panel body">
            @if (count($customerProjectID) == 0)
                <p>There are no projects matching this project id.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>View</th>
                    </tr>
                        @foreach ($customerProjectID as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->projectName}}</td>
                                <td>{{$item->customer->id}}</td>
                                <td>{{$item->customer->companyName}}</td>
                                <td>
                                    <a role="button" href="/project/{{$item->id}}" class="btn btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
                {{$customerProjectID->links()}}
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Projects based on project name</h3>
        </div>
        <div class="panel body">
            @if (count($customerProjectName) == 0)
                <p>There are no projects matching this project name.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>View</th>
                    </tr>


                    @foreach ($customerProjectName as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->projectName}}</td>
                            <td>{{$item->customer->id}}</td>
                            <td>{{$item->customer->companyName}}</td>
                            <td>
                                <a role="button" href="/project/{{$item->id}}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Projects based on company id</h3>
        </div>
        <div class="panel body">
            @if (count($customerID) == 0)
                <p>There are no projects matching this company id.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>View</th>
                    </tr>

                    @foreach ($customerID as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->projectName}}</td>
                            <td>{{$item->customer->id}}</td>
                            <td>{{$item->customer->companyName}}</td>
                            <td>
                                <a role="button" href="/project/{{$item->id}}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$customerID->links()}}
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Projects based on company name</h3>
        </div>
        <div class="panel body">
            @if (count($customerName) == 0)
                <p>There are no projects matching this company name.</p>
            @else
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Company ID</th>
                        <th>Company Name</th>
                        <th>View</th>
                    </tr>
                    @foreach($customerName as $item1)

                        @foreach ($item1 as $item2)
                        <tr>
                            <td>{{$item2->id}}</td>
                            <td>{{$item2->projectName}}</td>
                            <td>{{$item2->customer->id}}</td>
                            <td>{{$item2->customer->companyName}}</td>
                            <td>
                                <a role="button" href="/project/{{$item->id}}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection

<!--.panel.panel-default>.panel-heading>h3.panel-title^.panel.body>table.table.table-striped.table-hover>tr>th*4^tr>td*4-->