@extends('template')

@section('title')  Resultados @stop
@section('content')

<div class="row">
  <div class="col-xs-8 col-md-8">
    <a href="{{url('img/r5.png')}}" class="thumbnail">
      <img src="{{url('img/r5.png')}}">
    </a>
  </div>
  <div class="col-xs-4 col-md-4">
    <a href="{{url('img/r1.png')}}" class="thumbnail">
      <img src="{{url('img/r1.png')}}">
    </a>
  </div>
</div>
<div class="col-md-8">
    <div class="col-xs-6 col-md-6">
      <a href="{{url('img/r2.png')}}" class="thumbnail">
        <img src="{{url('img/r2.png')}}">
      </a>
    </div>
    <div class="col-xs-6 col-md-6">
      <a href="{{url('img/r4.png')}}" class="thumbnail">
        <img src="{{url('img/r4.png')}}">
      </a>
    </div>
    <div class="col-xs-6 col-md-6">
      <a href="{{url('img/r6.png')}}" class="thumbnail">
        <img src="{{url('img/r6.png')}}">
      </a>
    </div>
    <div class="col-xs-6 col-md-6">
        <a href="{{url('img/r7.png')}}" class="thumbnail">
          <img src="{{url('img/r7.png')}}">
        </a>
    </div>
  <div class="col-xs-12 col-md-12">
    <a href="{{url('img/r8.png')}}" class="thumbnail">
      <img src="{{url('img/r8.png')}}">
    </a>
  </div>
</div>
<div class="col-xs-4 col-md-4">
    <a href="{{url('img/r3.png')}}" class="thumbnail">
      <img src="{{url('img/r3.png')}}">
    </a>
  </div>
@stop