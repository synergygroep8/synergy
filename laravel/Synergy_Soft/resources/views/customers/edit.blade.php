@extends ('layouts.master-dash')

    @section('title')
    Customers edit
@endsection

@section('mainbar')

    <form action="{{route('putCostumer',$customer->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="companyName">Company name</label>
            <input class="form-control" type="text" name="companyName" value="{{$customer->companyName}}" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="residence">residence 1</label>
            <input class="form-control" type="text" name="residence" value="{{$customer->residence1}}" placeholder="Residence">
        </div>
        <div class="form-group">
            <label for="adress">Adress 1</label>
            <input class="form-control" type="text" name="adress" value="{{$customer->address1}}" placeholder="Adress">
        </div>
        <div class="form-group">
            <label for="houseNumber">house number</label>
            <input type="text" name="houseNumber" value="{{$customer->houseNumber1}}" placeholder="house number:" class="form-control">
        </div>
        <div class="form-group">
            <label for="zipCode">Zip codes</label>
            <input type="text" name="zipCode" value="{{$customer->zipCode1}}" placeholder="Zip code" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone1">phone number</label>
            <input type="text" name="phone1" value="{{$customer->phone1}}" placeholder="0653338519" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" value="{{$customer->email}}" placeholder="hoi@barocit.nl" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact">Contact person</label>
            <input type="text" name="contact" value="{{$customer->contactPerson}}" placeholder="Jaapy Kreekel" class="form-control">
        </div>
        <div class="form-group">
            <label for="initals">Initals</label>
            <input type="text" name="initals" value="{{$customer->initals}}" placeholder="J.K" class="form-control">
        </div>
        <div class="form-group">
            <label for="bankaccountNumber">Bankaccount number</label>
            <input type="text" name="bankaccountNumber" value="{{$customer->bankaccountNumber}}" placeholder="iban 00 000000" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn button-brown">
        </div>
    </form>

@endsection

@section('right-sidebar')
    @include ('customers.help.edit')
@endsection