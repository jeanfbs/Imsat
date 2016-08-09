@extends('template')

@section('title')  Sobre o Projeto @stop
@section('content')
<div class="panel panel-default">
  <div class="panel-body">
    <div class="page-header">
      <h1>IMSAT <small>Versão Beta</small></h1>
    </div>
    <blockquote>
      <h3>Sobre o IMSAT</h3>
      <p>
      O IMSAT é um sistema simples de recuperação de imagens de satélites com o principal objetivo
      de auxiliar pesquisadores em Processamento Digital de Imagens.
      Ele é um sistema básico de aquisição de imagens de regiões urbanas ou rurais, com base nas coordenadas
      de dois pontos da terra. O sistema utiliza dos serviços da API do Google Maps para fazer a geolocalização
      e obtenção das imagens das regiões especificadas pelos usuários. Ele trabalha com os padrões de projeto
      MVC e com a API Laravel em PHP para fazer todo o esqueleto do sistema.

    </p>
    </blockquote>
    <blockquote>
      <h3>Motivação</h3>
      <p>
      Esse projeto foi desenvolvido como Trabalho de Conclusão de Curso do aluno Jean Fabrício
      do curso de Bacharel em Sistemas de Informação da Universidade Federal de Uberlândia.
      Em parceria com <a href="http://www.portal.facom.ufu.br/node/99">Dr. Mauricio Cunha Escarpinati</a> (Orientador) e 
      <a href="http://www.facom.ufu.br/~backes/index.html"> André Backes</a> também professores na mesma universidade, foi proposto
      como primeira etapa do TCC o desenvolvimento de um sistema web que pudesse facilitar a aquisição de imagens
      por pesquisadores em PDI(Processamento Digital de Imagens).
      </p>
    </blockquote>
  </div>
</div>
@stop