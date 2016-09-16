@extends('template')

@section('title')  Acessibilidade @stop
@section('content')
<h1 class="text-center">Este sistema é melhor visualizado no Google Chrome</h1>
<div class="row">
  <div class="col-xs-2 col-md-offset-5 col-md-2">
    <a href="https://www.google.com/chrome/browser/desktop/index.html" class="thumbnail">
      <img src="{{url('img/chrome.png')}}" alt="Navegador Chrome Icone" width="150">
    </a>
  </div>
</div>
@stop