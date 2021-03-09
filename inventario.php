<?php 
  require 'php/conexion.php';
  require 'php/post.php';
  $where ="";

  $sql = "select * from accesorio";
  $resultado = $mysqli->query($sql);

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
          <a class="navbar-brand" href="home.php">LabCom</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Inicio</a></li>
            <li><a href="accesorios.php">Accesorios</a></li>
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
            <h1><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Préstamos <small>Equipos en Sala</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Hacer Un Préstamo
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="accesorios.php" type="button" data-toggle="modal" data-target="#addPage">Accesorios</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="home.php">Inicio</a></li>
          <li class="active">Préstamos - Equpos</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="home.php" class="list-group-item">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio
              </a>
              <a href="accesorios.php" class="list-group-item"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
              <a href="inventario.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Administrar Equipos y Accesorios <span class="badge"></span></a>
            </div>

            <div class="list-group">
                <a type="active" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-list-alt active main-color-bg" aria-hidden="true"></span> Reportes
                </a>
                <a href="reporte.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Equipos <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">


            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Inventario</h3>
              </div>
              <div class="panel-body">
                <br>
                <table class="table table-striped table-hover">
                <thead>
                <tr>
                        <th>Nro. Inventario de Accesorio</th>
                        <th>Nro. de Accesorio</th>
                        <th>Descripción</th>
                        <th>Existencias</th>
                        <th></th>
                        <th></th>
                </tr>
                </thead>
                
                <tbody>
                  <?php
                    while($row = $resultado->fetch_array(MYSQLI_ASSOC))
                    {
                  ?>
                  <tr>
                      <td><?php echo $row['NroInventarioAccesorio']; ?></td>
                      <td><?php echo $row['NroAccesorio']; ?></td>                    
                      <td><?php echo $row['Descripcion']; ?></td>
                      <td><?php echo $row['Existencias']; ?></td>
                      <td><a href="php/modificarinventario.php?NroInventarioAccesorio=<?php echo $row['NroInventarioAccesorio']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

                      <td><a href="#" data-href="php/eliminarinventario.php?NroInventarioAccesorio=<?php echo $row['NroInventarioAccesorio']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>                  
                  </tr>
                    <?php } ?>
                </tbody>
                </table>
                  <a class="btn btn-success" href="addinventario.php">Agregar Accesorio</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <br>
    <hr>

    <footer id="footer">
      <p>LabCom v1.0 &copy; 2021 - Desarrollado para LabCom</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Préstamo</h4>
					</div>
					
					<div class="modal-body">
						¿Está seguro de que desea eliminar equipo o accesorio seleccionado?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
  
 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <!-- Delete Modal Script -->

    <script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
  </body>
</html>
