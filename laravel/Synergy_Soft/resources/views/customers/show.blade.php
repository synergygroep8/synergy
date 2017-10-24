@extends ('layouts.master-dash')

@section('title')
    Customers list
@endsection


@section ('left-sidebar')
    @section ('left-bar-list')

        <?php
        switch (Auth::user()->department)
        {
            case 0: ?>
                @include('includes.finance-left-bar')
                @include ('includes.admin-left-bar')
                <?php break;
            case 1:
                ?>
                @include('includes.finance-left-bar')
                <?php
                break;

        } ?>
    @endsection
@endsection
{{--{{$columns = ['id', 'Company Name', 'Active', 'Email', 'Phone', 'Phone 2', 'Phone 3', 'Phone 4', 'Residence', 'Address', 'House Number', 'Zip Code', 'Residence 2', 'Address 2', 'House Number 2', 'Zip Code 2', 'Contact Person', 'Fax Number', 'Initials', 'Bankaccount Number', 'Balance', 'Profit', 'Invoices', 'BTW Code']}}--}}
@section ('mainbar')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped">
                <tr>
                    <th>id</th>
                    <td>{{$customer->id}}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ $customer->companyName }}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>
                        @if ($customer->isActive == '1')
                            <p class="green">Yes</p>
                        @else
                            <p class="red">No</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$customer->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$customer->phone1}}</td>
                </tr>
                <tr>
                    <th>Phone 2</th>
                    <td>{{$customer->phone2}}</td>
                </tr>
                <tr>
                    <th>Phone 3</th>
                    <td>{{$customer->phone3}}</td>
                </tr>
                <tr>
                    <th>Phone 4</th>
                    <td>{{$customer->phone4}}</td>
                </tr>
                <tr>
                    <th>Residence</th>
                    <td>{{$customer->residence1}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$customer->address1}}</td>
                </tr>
                <tr>
                    <th>House Number</th>
                    <td>{{$customer->houseNumber1}}</td>
                </tr>
                <tr>
                    <th>Zip Code</th>
                    <td>{{$customer->zipCode1}}</td>
                </tr>
                <tr>
                    <th>Residence 2</th>
                    <td>{{$customer->residence2}}</td>
                </tr>
                <tr>
                    <th>Address 2</th>
                    <td>{{$customer->address2}}</td>
                </tr>
                <tr>
                    <th>House Number 2</th>
                    <td>{{$customer->houseNumber2}}</td>
                </tr>
                <tr>
                    <th>Zip Code 2</th>
                    <td>{{$customer->zipCode2}}</td>
                </tr>
                <tr>
                    <th>Contact person</th>
                    <td>{{$customer->contactPerson}}</td>
                </tr>
                <tr>
                    <th>Fax number</th>
                    <td>{{$customer->faxNumber}}</td>
                </tr>
                <tr>
                    <th>Initials</th>
                    <td>{{$customer->initals}}</td>
                </tr>
                <tr>
                    <th>Bankaccount Number</th>
                    <td>{{$customer->bankaccountNumber}}</td>
                </tr>
                <tr>
                    <th>Invoices</th>
                    <td>{{$customer->invoices}} <a href="/"></a></td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <td>{{$customer->balance}}</td>
                </tr>
                <tr>
                    <th>Profit</th>
                    <td>{{$customer->profit}}</td>
                </tr>
                <tr>
                    <th>BKR</th>
                    <td>
                        @if ($customer->bkr == null)
                            Not started
                        @elseif ($customer->bkr == 0)
                            Not passed
                        @else
                            Passed
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>BTW Code</th>
                    <td>{{$customer->btwCode}}</td>
                </tr>
            </table>
            <a class="btn btn-warning" href="{{route('editCostumer',$customer->id)}}">Edit</a>
        </div>
    </div>
@endsection

@section ('right-sidebar')
    @include ('customers.help.show')
    @include ('customers.help.showDutch')

@endsection