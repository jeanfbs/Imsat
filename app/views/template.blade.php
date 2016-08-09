
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Projeto de Conclusão de Curso">
    <meta name="author" content="Jean Fabricio">
    <link rel="shortcut icon" href="{{url('favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/x-icon">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
     {{HTML::style('css/bootstrap.min.css')}}
    <!-- Import Font Awesome -->
    {{HTML::style('css/font-awesome.min.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/alertas.css')}}
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/jquery-migrate.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/html2canvas.js')}}
    {{HTML::script('js/alertas.js')}}
    <script 
      src="https://maps.googleapis.com/maps/api/js">
    </script>
  </head>

  <body>
    
    <div class="container logo"> 
      <h1>IMSAT <small>Beta</small></h1> 
      <p>
        Escolha as coordenadas e deixe o restante conosco!
      </p> 
    </div>
    <nav class="navbar navbar-imsat">
      <div class="container-fluid">
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('documentacao')}}">Documentação</a></li>
            <li><a href="{{url('sobre')}}">Sobre o Projeto</a></li>
            <li><a href="{{url('resultado')}}">Resultados</a></li>
            <li><a href="{{url('contato')}}">Contato</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="panel-alert" id="msg"></div>
      @yield('content')
    </div>
    
    <footer class="footer">
      <div class="container-footer">
        <p class="text-muted-footer text-center">
          Desenvolvido por Jean Fabrício aluno do curso Bacharel em Sistemas de Informação da
          Universidade Federal de Uberlândia
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('js/script.min.js')}}
  </body>
</html>
