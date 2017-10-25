@extends ('layouts.master')
@section('content')
<form action="{{action('InvoiceController@destroy', $invoice->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}

    <label for="none">Do you want to delete invoice nr <b>{{$invoice->invoiceNr}}</b>?</label>
    <div class="btn-group-lg">
    <input type="submit" name="none" value="Yes" class="btn btn-success">
    <a href="{{action('InvoiceController@show', $invoice->id)}}" class="btn btn-danger">No</a>
    </div>
</form>

@endsection