<?php
  session_start();
  $user = $_SESSION['username'];

  if(!isset($user)){
    header("location: index.php");
  }
?>
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
          <a class="navbar-brand" href="../home.php">LabCom</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../home.php">Inicio</a></li>
            <li><a href="../accesorios.php">Accesorios</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido, <?php echo $user ?>!</a></li>
            <li><a href="../index.php">Cerrar Sesión</a></li>
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
                <li><a href="../accesorios.php" type="button" data-toggle="modal" data-target="#addPage">Accesorios</a></li>
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
              <a href="../accesorios.html" class="list-group-item"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
              <a href="inventario.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Administrar Equipos y Accesorios <span class="badge"></span></a>
            </div>

            <div class="list-group">
                <a type="active" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-list-alt active main-color-bg" aria-hidden="true"></span> Reportes
                </a>
                <a href="../reporte.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Equipos <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Eliminación del Registro</h3>
              </div>

              <div class="panel-body">

              <?php
                require 'conexion.php';

                $NroInventarioAccesorio = $_GET['NroInventarioAccesorio'];

                 $sql = "DELETE FROM accesorio WHERE NroInventarioAccesorio=$NroInventarioAccesorio;";
                 $resultado = $mysqli->query($sql);
              ?>

                  <?php if($resultado) { ?>
                    <h3>Accesorio Eliminado!</h3>
                  <?php } else { ?>
                    <div class="alert alert-primary" role="alert">
                      Error al Eliminar el Accesorio! Probablemente el accesorio es objeto de un préstamo. Diríjase a la <a class="alert-link" href="../inventario.php">Página de Inventario</a>.
                    </div>
                    <?php } ?>

                    <a href="../inventario.php" class="btn btn-primary">Regresar</a>

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
