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
<div class="col-12 d-flex justify-content-center mt-2 mb-1 bg-success text-white ">
<h5>Sent</h5>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Transaction ID</th>
      <th scope="col">Source ID </th>
      <th scope="col">Destination ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($transactions[0] as $trans)
      <td>{{$trans->trans_id}}</td>
      <td>{{$trans->source_id}}</td>
      <td>{{$trans->dest_id}}</td>
      <td>{{$trans->amount}}</td>
      <td>{{$trans->trans_time}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-12 d-flex justify-content-center mt-2 mb-1 bg-success text-white">
<h5>Received</h5>
</div>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Transaction ID</th>
      <th scope="col">Source ID </th>
      <th scope="col">Destination ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($transactions[1] as $trans)
      <td>{{$trans->trans_id}}</td>
      <td>{{$trans->source_id}}</td>
      <td>{{$trans->dest_id}}</td>
      <td>{{$trans->amount}}</td>
      <td>{{$trans->trans_time}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
   
</div>
@endsection
