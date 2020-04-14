@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12 d-flex justify-content-center">

@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif

@if(Session::has('faild'))
    <div class="alert alert-danger">
        {{Session::get('faild')}}
        @php
            Session::forget('faild');
        @endphp
    </div>
@endif
@if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </div>
@endif

</div>
<div class="col-12 d-flex justify-content-center">
<h5>Your Balance is : {{auth()->user()->balance}}</h5>
</div>
    <div class="card col-6" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Send Money</h5>
<form method="post" 
action="{{url('/send')}}"
enctype="multipart/form-data">
@method('get')
{{csrf_field()}}
  <div class="form-group">
    <label for="Destination_Id">Destination ID</label>
    <input type="number" name="dest_Id" class="form-control" id="Destination_Id">
  </div>
  <div class="form-group">
    <label for="money_Amount">Money Amount</label>
    <input type="number" step="0.01" name="amount" class="form-control" id="money_Amount">
  </div>

  <button type="submit" class="btn btn-primary">Send</button>
</form>
  </div>
</div>
       
    </div>
</div>
@endsection
