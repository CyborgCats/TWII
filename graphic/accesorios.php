<?php
    require_once("../php/conexion.php");
  session_start();
  $user = $_SESSION['username'];

  if(!isset($user)){
    header("location: index.php");
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>CRTP | Préstamos</title>
        

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
#containers {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: auto;
}
        </style>
        
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
            <li class="active"><a href="home.php">Inicio</a></li>
            <li><a href="accesorios.php">Accesorios</a></li>
            <li><a href="salas.php">Salas</a></li>
            <li><a href="equipos.php">Equipos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido! <?php echo $user ?></a></li>
            <li><a href="index.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio <small>CRTP</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Realizar un Préstamo
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="accesorios.php" type="button" data-toggle="modal" data-target="#addPage">Accesorio</a></li>
                <li><a href="salas.php">Salas</a></li>
                <li><a href="equipos.php">Equipos</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Inicio</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="home.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
              </a>
              <a href="../accesorios.php" class="list-group-item"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
              <a href="../inventario.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Administrar Equipos y Accesorios <span class="badge"></span></a>
            </div>

            <div class="list-group">
                <a type="active" class="list-group-item">
                  <span class="glyphicon glyphicon-list-alt " aria-hidden="true"></span> Reportes
                </a>
                <a href="../pdf/index.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Equipos <span class="badge"></span></a>
                <a href="accesorios.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Existencia de Accesorios <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Vista General</h3>
              </div>
                <div class="panel-body">
                <script type="text/javascript">
                    $(function () {
                        $('#containers').highcharts({
                            chart: {
                                type: 'pie',
                                options3d: {
                                    enabled: true,
                                    alpha: 45,
                                    beta: 0
                                }
                            },
                            title: {
                                text: 'Reporte de Accesorios - Existencia de los Equipos y Accesorios'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 35,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.name}'
                                    }
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Existencias',
                                data: [
                                        <?php
                                        //Realizar la Consulta
                                        $sql = "Select * from accesorio";
                                        //Guardar en una variable
                                        $result = mysqli_query($mysqli, $sql);
                                        //Llamar a los registros dinamicamente
                                        while($registros=mysqli_fetch_array($result))
                                        {
                                            ?>
                                            //Generar la cadena con los datos de la BD
                                            ['<?php echo $registros["Descripcion"]; ?>', <?php echo $registros["Existencias"] ?>],
                                            
                                            <?php
                                        }
                                    ?>
                                ]
                            }]
                        });
                    });
            </script>
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
    <script src="Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
    <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="containers" style="height: 400px"></div>

	</body>
</html>

