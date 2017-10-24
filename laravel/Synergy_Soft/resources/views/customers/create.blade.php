@extends ('layouts.master-dash')

    @section('title')
    Customers create
@endsection

@section('mainbar')

    <form action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="companyName">Company name</label>
            <input class="form-control" type="text" name="companyName" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="residence">residence 1</label>
            <input class="form-control" type="text" name="residence" placeholder="Residence">
        </div>
        <div class="form-group">
            <label for="adress">Adress 1</label>
            <input class="form-control" type="text" name="adress" placeholder="Adress">
        </div>
        <div class="form-group">
            <label for="houseNumber">house number</label>
            <input type="text" name="houseNumber" placeholder="house number:" class="form-control">
        </div>
        <div class="form-group">
            <label for="zipCode">Zip codes</label>
            <input type="text" name="zipCode" placeholder="Zip code" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone1">phone number</label>
            <input type="text" name="phone1" placeholder="0653338519" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="hoi@barocit.nl" class="form-control">
        </div>
        <div class="form-group">
            <label for="contact">Contact person</label>
            <input type="text" name="contact" placeholder="Jaapy Kreekel" class="form-control">
        </div>
        <div class="form-group">
            <label for="initals">Initals</label>
            <input type="text" name="initals" placeholder="J.K" class="form-control">
        </div>
        <div class="form-group">
            <label for="bankaccountNumber">Bankaccount number</label>
            <input type="text" name="bankaccountNumber" placeholder="iban 00 000000" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn button-brown">
        </div>
    </form>

@endsection

@section('right-sidebar')
    @include ('customers.help.create')
    @include ('customers.help.createDutch')

@endsection