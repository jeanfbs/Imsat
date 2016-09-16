@extends('template')

@section('title')  Documentação @stop
@section('content')
<div class="panel panel-default">
  <div class="panel-body">
    <div class="page-header">
      <h1>Documentação IMSAT <small>Versão Beta</small></h1>
    </div>
    <div class="list">
      <ul class="list-unstyled">
        <li><a href="#tag1" title="Iniciando"><i class="fa fa-check" aria-hidden="true"></i> Iniciando</a></li>
        <li><a href="#tag2" title="Definindo coordenadas"><i class="fa fa-check" aria-hidden="true"></i> Definindo coordenadas</a></li>
        <li><a href="#tag3" title="Extraindo imagens"><i class="fa fa-check" aria-hidden="true"></i> Extraindo imagens</a></li>
        <li><a href="#tag4" title="Salvar imagem final"><i class="fa fa-check" aria-hidden="true"></i> Salvar imagem final</a></li>
      </ul>
    </div>
    <br>

    <blockquote>
      <h2 id="tag1">Iniciando</h2>
      <p>
        O IMSAT atualmente na versão beta, é um sistema simples de recuperação de imagens de satélite com 
        base em duas coordenadas distintas. Ele leva em consideração a distância entre os pontos como a diagonal de um retângulo ou 
        quadrado para construir o mosaico de imagens de toda a região de uma extremidade até a outra das coordenadas.
        Veja na figura abaixo como o IMSAT constrói o mosaico.
        <br><br>
        <img src="{{url('img/fig1.png')}}" alt="Figura 1" width="100%">
        <p class="text-center"><b>Figura 1</b></p>
      </p>
    </blockquote>
    <br>
    
    <blockquote>
      <h2 id="tag2">Definindo as coordenadas</h2>
      <p>
        Você pode inserir as coordenadas manualmente ou selecionar por meio da API Gmaps. A opção <i>'Configuração Automática de Coordenadas '</i>
        permite você escolher a coordenada apenas arrastando o mapa para a região desejada, e o sistema irá
        preencher os campos com a coordenada correta daquela região. Selecione a opção <i>'Início'</i> para fazer
        o preenchimento automático das coordenadas de Início, ou selecione a opção <i>'Final'</i> para
        fazer o preenchimento automático das coordenadas Finais.<br><br>
        <span class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Certifique que a opção selecionada na <i>'Configuração Automática de Coordenadas '</i> seja a que você está
          trabalhando</span><br><br>
        Veja a animação abaixo:
        <br><br>
        <img class="col-md-offset-4"src="{{url('img/animacao1.gif')}}" alt="Figura 1">
        <p class="text-center"><b>Animação 1</b></p>
        <br>
        Você também pode entrar com as coordenadas manualmente, basta inserir nos campos do formulário à esquerda
        a coordenada inicial e a final e definir a altitude selecionando o zoom.
        Para atualizar a região do GMaps clique no botão <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-location-arrow" aria-hidden="true"></i> Ir Para</button>.
        Lembre-se que essa ação irá levar em consideração a opção que está marcada na <i>'Configuração Automática de Coordenadas '</i> se estiver configurado
        <i>'inicio'</i> então o GMaps irá atualizar com base nas coordenadas iniciais, se estiver configurado como <i>'Final'</i>
        então será levado em consideração as coordenadas finais.
      </p>
    </blockquote>
    <br>
    
    <blockquote>
      <h2 id="tag3">Extraindo imagens</h2>
      <p>
        Para iniciar o processo de extração das imagens, clique no botão <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-picture-o" aria-hidden="true"></i> Extrair</button>.
        Aguarde enquanto o sistema gera os links das imagens e cria o arquivo zip com todas elas para download.<br><br>
        <span class="text-danger">
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Para regiões muito amplas o espaço entre os pontos é muito grande e a quantidade de imagens a serem exportadas
          também será, isso também se aplica para níveis de zoom máximo.
        </span class="text-danger">
        <br><br>
        Para cancelar o processo de extração clique no botão <button type="button" class="btn btn-danger btn-xs">Cancelar</button> da caixa de diálogo.
        <br><br>
        <img class="col-md-offset-2"src="{{url('img/fig2.png')}}" alt="Figura 2" width="70%">
        <p class="text-center"><b>Figura 2</b></p>
        <br>
      </p>
    </blockquote>
    
    <blockquote>
      <h2 id="tag4">Salvar imagem final</h2>
      <p>
        Após o processo de extração for concluido, será disponibilizado o link do Zip de todas as imagens, para baixar clique no link <a href="#"><i class='fa fa-download fa-fw' aria-hidden='true'></i>Baixar Zip</a>.
        <br><br>
        <img class="col-md-offset-2"src="{{url('img/fig3.png')}}" alt="Figura 3" width="70%">
        <p class="text-center"><b>Figura 3</b></p>
        <br>
      </p>
    </blockquote>
  </div>
</div>
@stop