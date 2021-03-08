<?php 
  require 'php/conexion.php';
  $where ="";

  $sql = "SELECT prestamoaccesorio.PrestamoID, accesorio.Descripcion, usuario.NombreUsuario 
  FROM accesorio 
  INNER JOIN prestamoaccesorio ON accesorio.NroInventarioAccesorio = prestamoaccesorio.NroInventarioAccesorio 
  INNER JOIN usuario ON usuario.NroCIUsuario = prestamoaccesorio.NroCIUsuario;";
  $resultado = $mysqli->query($sql);

  $sql2 = "SELECT * from accesorio";
  $resultado2 = $mysqli->query($sql2);

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
    <link rel="shortcut icon" type="image/ico" href="../img/logofaadu.ico"/>
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
            <li><a href="salas.php">Salas</a></li>
            <li><a href="equipos.php">Equipos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Bienvenido, <?php echo $user ?>!</a></li>
            <li><a href="index.php">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos <small>Equipos - Accesorios</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Realizar un Préstamo
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
          <li class="active">Préstamos - Accesorios</li>
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
              <a href="accesorios.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Préstamos - Accesorios <span class="badge"></span></a>
              <a href="inventario.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Administrar Equipos y Accesorios <span class="badge"></span></a>
            </div>
            <div class="list-group">
                <a type="active" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-list-alt active main-color-bg" aria-hidden="true"></span> Reportes
                </a>
                <a href="pdf/index.php" class="list-group-item"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Diarios de Equipos <span class="badge"></span></a>
                <a href="graphic/accesorios.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Existencia de Accesorios <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Préstamos</h3>
                </div>
                <div class="panel-body">

                <form>
                  <div class="form-row">

                    <table class="table table-striped table-hover">
                      <thead>
                      <tr>                        
                              <th>Nro. Préstamo</th>
                              <th>Item Accesorio</th>
                              <th>Nombre de Usuario</th>
                              <th><a class="btn btn-success btn-sm" href="#" data-href="php/añadiraccesorio.php?NroInventarioAccesorio=<?php echo $row2['NroInventarioAccesorio']; ?>" data-toggle="modal" data-target="#añadiraccesorio">Añadir</a></th>
                      </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                          while($row = $resultado->fetch_array(MYSQLI_ASSOC))
                          {
                        ?>
                        <tr>
                          
                            <td><?php echo $row['PrestamoID']; ?></td>
                            <td><?php echo $row['Descripcion']; ?></td>
                            <td><?php echo $row['NombreUsuario']; ?></td>
                            <td><a href="php/modificaraccesorio.php?PrestamoAccesorioDetalleID=<?php echo $row['PrestamoID']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

                            <td><a href="#" data-href="php/eliminaraccesorio.php?PrestamoAccesorioDetalleID=<?php echo $row['PrestamoAccesorioDetalleID']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                    </table>

                    <br>
                    <!-- <button type="submit" class="btn btn-primary">Enviar</button>-->
                  </div>

                </form>
                
                </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
        <p>LabCom v1.0 &copy; 2021 - Desarrollado para LabCom</p>
    </footer>    

    <!-- Modal -->
    <div class="modal fade" id="añadiraccesorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Añadir Accesorios</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="php/añadiraccesorio.php" method="POST">
              <div class="modal-body">
                      
                      <!--<input type="hidden" name="nroprestamoaccesorio" id="nroprestamoaccesorio" value="<?php echo $row['PrestamoID']; ?>">-->
                      <div class="form-group">
                        <label for="nroprestamoaccesorio">Nro. Préstamo-Accesorio </label>
                        <input type="text" class="form-control" name="nroprestamoaccesorio" id="nroprestamoaccesorio" aria-describedby="emailHelp" placeholder="Nro. PA" required>
                        <small id="emailHelp" class="form-text text-muted">Inserte el Nro. de PA aquí.</small>
                      </div>

                      <div class="form-group">
                        <label for="ciadmin">C.I. Administrador </label>
                        <input type="text" class="form-control" name="ciadmin" id="ciadmin" aria-describedby="emailHelp" placeholder="C.I. Administrador" required>
                        <small id="emailHelp" class="form-text text-muted">Inserte el C.I. del administrador aquí.</small>
                      </div>
                      
                      <div class="form-group">
                        <label for="ciusuario">C.I. Usuario </label>
                        <input type="text" class="form-control" name="ciusuario" id="ciusuario" aria-describedby="emailHelp" placeholder="C.I. Usuario" required>
                        <small id="emailHelp" class="form-text text-muted">Inserte el C.I. del usuario aquí.</small>
                      </div>

                      <div class="form-group">
                        <label for="nroprestamo">Nro. Préstamo </label>
                        <input type="text" class="form-control" name="nroprestamo" id="nroprestamo" aria-describedby="emailHelp" placeholder="Nro. Préstamo" required>
                        <small id="emailHelp" class="form-text text-muted">Inserte el Nro. de Préstamo aquí.</small>
                      </div>
                    
                      <div class="form-group">
                        <label for="codaccesorio">Código Accesorio</label>
                        <input type="text" class="form-control" name="codaccesorio" id="codaccesorio" aria-describedby="emailHelp" placeholder="Codigo Accesorios" required>
                        <small id="emailHelp" class="form-text text-muted">Inserte el código del accesorio aquí.</small>
                      </div>
                  
              </div>
              <div class="modal-footer">            
                <button type="submit" name="guardardatos" class="btn btn-success">Añadir Accesorio</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              </div>
          </form>
        </div>
      </div>
    </div>

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
						¿Está seguro de que desea eliminar el préstamo??
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

    <script>
			$('#add-item').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Add URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
    </script>

<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
    
  </body>
</html>