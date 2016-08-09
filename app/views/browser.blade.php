@extends('template')

@section('title')  Resultados @stop
@section('content')
<h1 class="text-center">Este Sistema é melhor visualizado nos navegadores</h1>
<div class="row">
  <div class="col-xs-2 col-md-offset-4 col-md-2">
    <a href="https://www.google.com/chrome/browser/desktop/index.html" class="thumbnail">
      <img src="{{url('img/chrome.png')}}" alt="Navegador Chrome Icone" width="150">
    </a>
  </div>
  <div class="col-xs-2 col-md-2">
    <a href="https://www.mozilla.org/pt-BR/firefox/new/" class="thumbnail">
      <img src="{{url('img/firefox.png')}}" alt="Navegador Firefox Icone" width="150">
    </a>
  </div>
</div>

@stop