@extends ('layouts.master-dash')

    @section('title')
    Customers create
@endsection

@section('mainbar')

    <form action="" method="post">
        <div class="form-group">
            <label for="Name">Compeny Name</label>
            <input class="form-control" type="text" name="Name" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="Residence">residence 1</label>
            <input class="form-control" type="text" name="Residence" placeholder="Residence">
        </div>
        <div class="form-group">
            <label for="Adress">Adress 1</label>
            <input class="form-control" type="text" name="Adress" placeholder="Adress">
        </div>
        <div class="form-group">
            <label for="houseNumber">house number</label>
            <input type="text" name="houseNumber" placeholder="house number:" class="form-control">
        </div>
        <div class="form-group">
            <label for="zipCode">Zip codes</label>
            <input type="text" name="ZipCode" placeholder="Zip code" class="form-control">
        </div>
        <div class="form-group">
            <label for="phoneNumber">phone number</label>
            <input type="text" name="phoneNumber" placeholder="0653338519" class="form-control">
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
            <input type="submit" class="btn btn-primary">
        </div>
    </form>

@endsection