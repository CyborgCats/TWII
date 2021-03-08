<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LabCom | Préstamos</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LabCom</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../home.php">Inicio</a></li>
            <li><a href="accesorios.html">Accesorios</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido, <?php echo $user?>!</a></li>
            <li><a href="login.html">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Préstamos <small>Equipos</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Realizar un Préstamo 
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Accesorios</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Inicio</a></li>
          <li><a href="equipos.php">Préstamos - Equipos</a></li>
          <li class="active">Préstamo</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.html" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
              </a>
              <a href="../accesorios.php" class="list-group-item"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
            </div>

            <div class="list-group">
                <a type="active" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-list-alt active main-color-bg" aria-hidden="true"></span> Reportes
                </a>
                <a href="pdf/index.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Préstamos <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Formulario de Préstamo</h3>
              </div>

              <div class="panel-body">

              <?php
                require 'conexion.php';

                 $prestamoaccesorioid = $_POST['prestamoaccesorioid'];
                 $nroprestamo = $_POST['nroprestamo'];
                 $ciadmin = $_POST['ciadmin'];
                 $ciusuario = $_POST['ciusuario'];
                 $codaccesorio = $_POST['codaccesorio'];

                 $sql = "UPDATE prestamoaccesorio SET PrestamoID='$prestamoaccesorioid', NroPrestamo='$nroprestamo', NroCIAdmin='$ciadmin', NroCIUsuario='$ciusuario',NroInventarioAccesorio='$codaccesorio'
                 WHERE PrestamoID = $prestamoaccesorioid ";
                 $resultado = $mysqli->query($sql);
              ?>

                  <?php if($resultado) { ?>
                    <h3>Préstamo de accesorio modificado correctamente!</h3>
                  <?php } else { ?>
                    <h3>Error al modificar el préstamo!</h3>
                    <?php } ?>

                    <a href="../accesorios.php" class="btn btn-primary">Regresar</a>

              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>LabCom v1.0 &copy; 2021 - Desarrollado para LabCom</p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
