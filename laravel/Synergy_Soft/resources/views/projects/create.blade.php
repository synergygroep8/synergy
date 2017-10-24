@extends ('layouts.master-dash')

@section('title')

@endsection

@section('mainbar')

    {{--Form maken--}}

    <form action="{{route('ProjectStore')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">

            <label for="cid">Cid</label>
            <select class="form-control" id="cid" name="cid">
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->companyName}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="projectName">The name of the project?</label>
            <input class="form-control" type="text" name="projectName" placeholder="Name of the Project">
        </div>


        <div class="form-group">
            <label for="software">Needed software for the project?</label>
            <textarea class="form-control"  name="software" placeholder="List of the needed software"></textarea>
        </div>
        <div class="form-group">
            <label for="software">Needed hardware for the project?</label>
            <textarea class="form-control"  name="hardware" placeholder="List of the needed hardware"></textarea>
        </div>
        <div class="form-group">
            <label for="OS">Used Operating system for the project?</label>
            <input class="form-control" type="text" name="OS" placeholder="Name of Operating system">
        </div>
        <div class="form-group">
            <label for="lastContact">Last contacted person (als laatse contact heeft gehad)</label>
            <input class="form-control" type="text" name="lastContact" placeholder="Name of the last contact peron">
        </div>

        <div class="form-group">
            <label for="contactClient">Made agreements</label>
            <textarea class="form-control"  name="contactClient" placeholder="List of the agreements that have been made"></textarea>
        </div>

        <div class="form-group">
            <label for="creditLimit">The limit of clients project credit</label>
            <input class="form-control" type="number" name="creditLimit" placeholder="&euro;">
        </div>

        <div class="form-group">
            <label for="isMaintained">is the project maintained?</label>
            <input class="form-control" type="checkbox" name="isMaintained" placeholder="">
        </div>
        <div class="form-group">
            <input type="submit" class="btn button-brown">
        </div>


    </form>

@endsection
@section('right-sidebar')
    @include('projects.help.create')
    @include('projects.help.createDutch')

@endsection

