<?php

require '../php/conexion.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) as contar FROM administrador WHERE Usuario = '$username' and Password = '$password'";
$resultado = mysqli_query($mysqli, $query);
$array = mysqli_fetch_array($resultado);

if($array['contar']>0){
    $_SESSION['username'] = $username;
    header("location: ../home.php");
}else{
    header("location: ../index.php");
}
?>