<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'lab');
    if($mysqli->connect_error){
        die('Error en la conexión al servidor' . $mysqli->connect_error);
    }
?>