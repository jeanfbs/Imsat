@extends('template')

@section('title')  IMSAT @stop
@section('content')
<div class="panel panel-default" id="panel-home">
  <div class="panel-body">
    <div class="col-md-6">
      <div id="map"></div>
    </div>
    <div class="col-md-6">
      <form id="form" baseurl="{{Request::root()}}">
        <fieldset>
          <caption><b>Configuração Automática de Coordenadas</b></caption>
          <br><br>
          <div class="form-group">
            <label class="radio-inline">
              <input type="radio" name="auto" checked value="1"> Início
            </label>
            <label class="radio-inline">
              <input type="radio" name="auto" value="2"> Final
            </label>
          </div>
        </fieldset>
        <fieldset>
          <caption><b>Início</b></caption>
          <div class="form-group">
            <div class="col-md-6">
              <label for="latitude">Latitude</label>
              <input type="number" class="form-control" name="lati" id="lat_start" placeholder="Ex:. -18.49594" value="-18.92">
            </div>
            <div class="col-md-6">
              <label for="longitude">Longitude</label>
              <input type="number" class="form-control" name="longi" id="long_start" placeholder="Ex:. -48.098081" value="-48.26">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <caption><b>Fim</b></caption>
          <div class="form-group">
            <div class="col-md-6">
              <label for="latitude">Latitude</label>
              <input type="number" class="form-control" name="latf" id="lat_end" placeholder="Ex:. -18.49594" value="-18.9201">
            </div>
            <div class="col-md-6">
              <label for="longitude">Longitude</label>
              <input type="number" class="form-control" name="longf" id="long_end" placeholder="Ex:. -48.098081" value="-48.249">
            </div>
          </div>
        </fieldset>
        <div class="form-group">
          <label for="zoom">Zoom</label>
          <select class="form-control" name="zoom" id="zoom">
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18" selected>18</option>
            <option value="19">19</option>
          </select>
        </div>
        <div class="col-sm-offset-4">
          <br><br>
          <button type="button" class="btn btn-primary" id="atualizar"><i class="fa fa-location-arrow" aria-hidden="true"></i> Ir Para</button>
          <button type="button" class="btn btn-primary" id="extrair" data-toggle="modal" data-target="#modal_status"><i class="fa fa-picture-o" aria-hidden="true"></i> Extrair</button>
          <!-- <button class="btn btn-default" type="button" id="foto"><i class="fa fa-download" aria-hidden="true"></i> Download</button> -->
        </div>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<br>
<div class="panel panel-default">
  <div class="panel-body" id="resultado">

  </div>
</div>
<br>
<!--                Modal de Barra de Progresso             -->
    <div class="modal fade " tabindex="-1" role="dialog" id="modal_status">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
            <h4 class="modal-title">Extraindo Imagens</h4>
          </div>
          <div class="modal-body">
            <p>Aguarde enquanto as imagens são extraídas...<br>
               <small>Isso pode demorar um pouco!</small>
            </p>
            <div class="progress">
                  <div class="progress-bar progress-bar-striped active" id="pbar" role="progressbar" aria-valuenow = "0" aria-valuemin="0" aria-valuemax="100" >
                    <span class="sr-only">45% Completos</span>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancel">Cancelar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop