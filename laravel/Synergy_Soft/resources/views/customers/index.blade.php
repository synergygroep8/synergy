<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="companyGroupHeading">
        <h4 class="panel-title">
            <a href="#companyGroup" class="btn-block" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="companyGroup"> Companies </a>
        </h4>
    </div>
    <div class="panel-collapse collapse" role="tabpanel" id="companyGroup" aria-labelledby="companyGroupHeading" aria-expanded="true" style="">

        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="{{route('searchcompany')}}" class="input-group input-group-lg"><input type="text" placeholder="Company name, Company id, Address, Residence" class="form-control input-lg" name="q"><span
                            class="input-group-btn">
            <button type="submit" class="btn button-brown btn-lg">Search</button>
            </span></form>
            </div>
            <div class="panel-body">
                <h3>Company list</h3>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Company name</th>
                        <th>Projects</th>
                        {{--<th>Invoices</th>--}}
                        <th>View</th>
                    </tr>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company->companyName}}</td>
                            <td>{{$company->projects->count()}}</td>
                            {{--<td></td>--}}
                            <td>
                                <a class="btn btn-info" href="/customers/{{$company->id}}">view</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
                {{ $companies->links() }}

            </div>
        </div>
    </div>
</div>