<?php
    require_once("../php/conexion.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
        ${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Reporte de Accesorios, Existencia de los Equipos y Accesorios'
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
            name: 'Deudas',
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
	</head>
	<body>

<script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>
