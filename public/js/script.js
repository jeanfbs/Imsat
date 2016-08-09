/*******************************************************************
*   Trabalho de Conclusão de Curso de Sistemas de Informação
*   da Universidade Federal de Uberlândia - 2016
*
* Arquivo Root 
* @author: Jean Fabricio <jeanufu21@gmail.com>
* @since: 28/06/2015
*
********************************************************************/

/* Variaveis Globais    */

var started = false; // controla o evento de printar apenas quando é realizado o click
var salto_coluna = 0;// controla a quantidade de colunas e o tamanho de cada imagem.
var salto_linha = 0;// controla a quantidade de linhas e o tamanho de cada imagem.
var interval;// loop 
var map;
var l = 0; // nomeação dos arquivos linha e coluna
var c = 0;

var imgbs64 = [];

$(document).ready(function(){
	
    initialize();
    $("#extrair").on("click",function(){
        started = true;
        console.log(imgbs64);
        $("#pbar").attr("valuenow",0);
        $("#pbar").width('0%');
        $("#resultado").empty();

        var par = {};

         par.lat1 = parseFloat($('#lat_start').val());
         par.lng1 = parseFloat($('#long_start').val());
         par.lat2 = parseFloat($('#lat_end').val());
         par.lng2 = parseFloat($('#long_end').val());
         par.zoom = parseInt($('#zoom').val(),10);
        
        resolveCordinate(par);


    });

    $("#cancel").on("click",function(){

            clearInterval(interval);
            started = false;
            imgbs64 = []; // emtpy array of images base64            
            $("#pbar").attr("valuenow",0);
            $("#pbar").width('0%');
            alertSucesso("A extração foi cancelada!");
    });

    

    $("#atualizar").on("click",function(){
        var par = {};
        if(parseInt($("input[name=auto]:checked").val(),10) == 1)
        {
            par.lat1 = parseFloat($('#lat_start').val());
            par.lng1 = parseFloat($('#long_start').val());
        }
        else
        {
            par.lat1 = parseFloat($('#lat_end').val());
            par.lng1 = parseFloat($('#long_end').val());
        }
         
         par.zoom = parseInt($('#zoom').val(),10);
         update(par.lat1,par.lng1,par.zoom);
    });

    

    google.maps.event.addListener(map,'tilesloaded',function(){

        if(started)
        {
            printMap(l,c);
        }
        
    });

    google.maps.event.addListener(map,'drag',function(){

        split = map.getCenter().toString().replace("(","").split(",");
        
        lat = parseFloat(split[0]);
        lng = parseFloat(split[1]);

        if(parseInt($("input[name=auto]:checked").val(),10) == 1)
        {
            $("#lat_start").val(lat.toFixed(4));
            $("#long_start").val(lng.toFixed(4));
        }
        else
        {
            $("#lat_end").val(lat.toFixed(4));
            $("#long_end").val(lng.toFixed(4));
        }
        
        
    });

});

/*****************************************************
*   cria os links de download para as imagens
******************************************************/
function download_image(linha,coluna,canvas) {

    var fileName = "l_"+linha+"_c_"+coluna+".png";
    
    var col_md_1 = $("<div></div>");
    col_md_1.addClass('col-md-2');
    
    imgbs64.push({nome:fileName,base64:canvas.toDataURL("image/png")});
    
    var link = $("<a></a>");
    link.prop("download",fileName);
    link.prop("href",canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"));

    link.text("Linha "+linha+" Coluna "+coluna);
    col_md_1.append(link);
    $("#resultado").append(col_md_1);
}

/*****************************************************
*   tira a screanshot da image do mapa do google
******************************************************/
function printMap(linha,coluna) {

    html2canvas([$("#map")[0]], {
        logging: false,
        useCORS: true,
        onrendered: function (canvas) {
            download_image(linha,coluna,canvas);
        }
    });
}


/*****************************************************
*   Inicializa a Api do google Maps
******************************************************/

function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(-18.90,-48.24),
    zoom:18,
    disableDefaultUI: true,
    mapTypeId:google.maps.MapTypeId.SATELLITE
  };
  map = new google.maps.Map(document.getElementById("map"),mapProp);

}
/*****************************************************
*   Atualiza uma coordenada no mapa da API do Google
******************************************************/
function update(lat,lng,zoom) { 
  latlng = new google.maps.LatLng(lat,lng);
  map.setZoom(zoom);
  map.setCenter(latlng);
}

/*****************************************************
*   Resolve as coordenadas fornecidas pelo usuario
*   
*   Essa função resolve o quanto deve se mover no
*   mapa para cada tipo de zoom baseado na quantidade
*   correta de graus nas coordenadas x,y.
*   Como o mapa possui apenas 500 x 500 px, então
*   todo os valores calculados para essa função
*   são basedados nessas dimensões do mapa.
*
*   @param par Objeto parametro com as informações 
******************************************************/
function resolveCordinate(par){
    

    var DLAT = 0;       // Deslocamento da Latitude
    var DLNG = 0;       // Deslocamento da Longitude
    var timeRepeat = 0; // Intervalo de Loop para que as imagens sejam carreadas pelo API GMaps
    
    // Condições para os diversos tipos de zoom
    if(par.zoom == 19)
    {
        DLAT = 0.00127; // conforme dito esses valores foram calculados com base nas dimensões
        DLNG = 0.00135; // do mapa 500 x 500 px.
        timeRepeat = 2500;
    }
    else if(par.zoom == 18)
    {
        DLAT = 0.00254;
        DLNG = 0.00270;
        timeRepeat = 2050;
        
    }
    else if(par.zoom == 17)
    {
        DLAT = 0.00508;
        DLNG = 0.00540;
        timeRepeat = 1800;
        
    }
    else if(par.zoom == 16)
    {
        DLAT = 0.0101;
        DLNG = 0.0108;
        timeRepeat = 1700;
        
    }
    // calcula quantas colunas irá ter o mosaico de imagens
    salto_coluna = parseInt(Math.ceil((Math.abs(par.lng2 - par.lng1) / DLNG)),10);
    // calcula quantas linhas irá ter o mosaico de imagens
    salto_linha = parseInt(Math.ceil((Math.abs(par.lat2 - par.lat1) / DLAT)),10);
    // se as coordenadas forem muito proximas cria-se apenas uma coluna ou linha
    if(salto_coluna == 0) salto_coluna = 1;
    if(salto_linha == 0) salto_linha = 1;
    
    var inc = parseFloat(100 / (salto_coluna * salto_linha));

    var lat_aux = 0;// var aux para iterar as coordenadas de latitude
    var lng_aux = 0;// var aux para iterar as coordenadas de longitude

    // Resolve o Quadrante terrestre das coordenadas
    switch(getQuadrant(par))
    {
        case 1:
        {
            console.log("Quandrante 1");
            break;
        }
        case 2:
        {
            console.log("Quandrante 2");
            break;
        }
        case 3:
        {
            console.log("Quandrante 3");
            
            transporXY(par); // transpoe as coordenadas para montar o mosaico
            
            lat_aux = par.lat1;
            lng_aux = par.lng1;
            
            var i = 0;
            var j = 0;

            // loop com delay para dar tempo de o Gmaps 
            // carregar as imagens e depois tirar o screanshot da mesma
            interval = setInterval(function(){

                
                if(i == salto_linha) // fim do loop
                {

                    clearInterval(interval);
                    started = false;
                    $('#modal_status').modal('hide');
                    $("#pbar").attr("valuenow",100);
                    $("#pbar").width('100%');
                    $.ajax({
                        type: "POST",
                        url : $("#form").attr("baseurl")+"/image",
                        data : {images:imgbs64}

                    }).done(function(path){
                        var all = "<div class='col-md-2'><a href='"+path+"' download>Baixar Zip</a></div>";
                        $("#resultado").prepend(all);
                        clearImagesArray();
                    });
                    return started;
                }
                
                if(j > -1 && j < salto_coluna)
                {
                    update(lat_aux,lng_aux,par.zoom);
                    l = i;
                    c = j;

                    value = parseFloat($("#pbar").attr("valuenow")) + inc;

                    $("#pbar").attr("valuenow",value);
                    $("#pbar").width(value + '%');
                    

                    if(par.lng1 != par.lng2)
                    {

                        if(par.lng1 < par.lng2) lng_aux += DLNG;
                        else    lng_aux -= DLNG;
                    }  
                    
                }

                j++;
                if(j == salto_coluna)
                {
                    lng_aux = par.lng1;

                    if(par.lat1 != par.lat2)
                    {
                        if(par.lat1 < par.lat2)     lat_aux += DLAT;
                        else    lat_aux -= DLAT;

                    }

                    j = 0;
                    i++;
                }

            },timeRepeat);
            break;
        }
        case 4:
        {
            console.log("Quandrante 4");
            break;
        }
        default:
        {
            console.log("%cErro: A distância das coordenadas de mapeamento é muito grande","color:red");   
        }
    }
    

}


/**********************************************************************
*   Função responsavel por transpor as coordenadas nas linhas e colunas
*   para formar o mosaico corretamente
***********************************************************************/
function transporXY(par) {
    
    if(par.lat1 < par.lat2 && par.lng1 > par.lng2)
    {
        aux = par.lat1;
        par.lat1 = par.lat2;
        par.lat2 = aux;

        aux = par.lng1;
        par.lng1 = par.lng2;
        par.lng2 = aux;    
    }
    else if(par.lat1 < par.lat2 && par.lng1 < par.lng2)
    {
        aux = par.lat1;
        par.lat1 = par.lat2;
        par.lat2 = aux;
    }
    else if(par.lat1 > par.lat2 && par.lng1 > par.lng2)
    {
        tmp = par.lng1;
        par.lng1 = par.lng2;
        par.lng2 = tmp;
    }

}
/*****************************************************
*   Resolve o Quadrante terrestres das coordenadas
*
*   Quadrante 1 Inglaterra, Russia, Irlanda;
*   Quadrante 2 EUA, Canada, Alasca, Mexico;
*   Quadrante 3 Brasil, Agentina, Chile;
*   Quadrante 4 África, India, Oceania;
*
******************************************************/
function getQuadrant(par){

    if(par.lat1 > 0 && par.lng1 > 0 && par.lat2 > 0 && par.lng2 > 0 )
        return 1; 
    else if(par.lat1 > 0 && par.lng1 < 0 && par.lat2 > 0 && par.lng2 < 0)
        return 2; 
    else if(par.lat1 < 0 && par.lng1 < 0 && par.lat2 < 0 && par.lng2 < 0 )
        return 3;
    else if(par.lat1 < 0 && par.lng1 > 0 && par.lat2 < 0 && par.lng2 > 0)
        return 4;
    else
    {
        /*
        * As coordenadas ultrapassam mais de um quadrante
        * nesse caso a construção do mapa não pode ser feita.
        */
         return 0; 
    }
}



function clearImagesArray(){
    while (imgbs64.length > 0) {
    imgbs64.pop();
    }
}

