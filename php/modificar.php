<?php 
    require 'conexion.php';

    $NroPrestamoEquipo = $_GET['NroPrestamoEquipo'];

    $sql = "SELECT * FROM prestamoequipos WHERE NroPrestamoEquipo = '$NroPrestamoEquipo'";
    $resultado = $mysqli->query($sql);

    $row = $resultado->fetch_array(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRTP | Préstamos</title>
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
          <a class="navbar-brand" href="#">CRTP</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Inicio</a></li>
            <li><a href="../accesorios.html">Accesorios</a></li>
            <li><a href="../salas.html">Salas</a></li>
            <li><a href="../equipos.php">Equipos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido!</a></li>
            <li><a href="../login.html">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Préstamos <small>Equipos</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Realizar un Préstamo 
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Accesorios</a></li>
                <li><a href="#">Salas</a></li>
                <li><a href="#">Equipos</a></li>
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
          <li><a href="pages.html">Préstamos - Equipos</a></li>
          <li class="active">Préstamo</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="../home.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
              </a>
              <a href="../accesorios.html" class="list-group-item"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
              <a href="../salas.html" class="list-group-item"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Préstamos - Salas <span class="badge"></span></a>
              <a href="../equipos.php" class="list-group-item"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Préstamos - Equipos <span class="badge"></span></a>
              <a href="../inventario.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Administrar Equipos y Accesorios <span class="badge"></span></a>
            </div>

            <div class="list-group">
                <a type="active" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-list-alt active main-color-bg" aria-hidden="true"></span> Reportes
                </a>
                <a href="pdf/index.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Equipos <span class="badge"></span></a>
                <a href="graphic/accesorios.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Existencia de Accesorios <span class="badge"></span></a>
                <a href="graphic/docentes.php" class="list-group-item"><span class="glyphicon glyphicon-cd" aria-hidden="true"></span> Docentes y Accesorios <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Modificación de Préstamo</h3>
              </div>

              <div class="panel-body">
                  <form method="POST" action="updateprestamoequipo.php" autocomplete="off">
                    <div class="form-row">

                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Hora de Ingreso</label>
                        <input type="time" class="form-control" id="horaingreso" name="horaingreso"  value="<?php echo $row['HoraIngreso']; ?>" required>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="inputPassword4">Hora de Salida</label>
                        <input type="time" class="form-control" id="horasalida" name="horasalida"  value="<?php echo $row['HoraSalida']; ?>" required>
                      </div>
                      
                      <input type="hidden" name="nroprestamoequipo" id="nroprestamoequipo" value="<?php echo $row['NroPrestamoEquipo']; ?>">

                    </div>

                    <div class="form-group col-md-12">
                      <label for="inputAddress">C.I. Estudiante</label>
                      <input type="number" class="form-control"  id="ciestudiante" name="ciestudiante"  value="<?php echo $row['NroCIEstudiante']; ?>" required>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="inputAddress2">Número de Equipo</label>
                      <input type="number" class="form-control"  id="equipo" name="equipo"  value="<?php echo $row['NroEquipo']; ?>" required>
                    </div>  

                    <br>
                    <button type="submit" class="btn btn-primary">Aplicar Cambios</button>
                  </form>
              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
    <p>CRTP v1.0 &copy; 2019 - Desarrollado para el CRTP (FAADU)</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
