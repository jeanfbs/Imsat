@extends('template')

@section('title')  Contato @stop
@section('content')
<!-- caixa de alerta -->
<div class="panel-alert" id="msg"></div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="page-header">
      <h1>Fale Conosco</h1>
    </div>
    {{Form::open(array('url' => '/contato','class' => 'form-horizontal ','id' => 'cadastro'))}}
      <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="nome" id="nome" placeholder="Nome">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control required" name="email" id="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="assunto" class="col-sm-2 control-label">Assunto</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" id="assunto" name="assunto" placeholder="Assunto">
        </div>
      </div>
      <div class="form-group">
        <label for="assunto" class="col-sm-2 control-label">Mensagem</label>
        <div class="col-sm-5">
          <textarea class="form-control required" name="mensagem" rows="3"></textarea>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-primary" id="enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
          <button type="reset" class="btn btn-warning" id="enviar"><i class="fa fa-trash" aria-hidden="true"></i> Limpar</button>
        </div>
      </div>
    {{Form::close()}}
  </div>
</div>
<script>
$(document).ready(function(){$("#enviar").on("click",function(){var o=!1;return $(".required").each(function(){""==$(this).val()&&(o=!0)}),o?(alertErro("Preencha todos os campos"),!1):void $("#cadastro").submit()})});
</script>
@stop