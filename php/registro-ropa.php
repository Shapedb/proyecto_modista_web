<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

include('database/conexion.php');

$idRopa = 9;

$nomRopa=$_POST['txtRopa'];

$consulta = "INSERT INTO `tipo_ropa` (`CVE_TIPO_ROPA`, `NOMBRE`) 
VALUES ('$idRopa', '$nomRopa')";

$resultado=mysqli_query($conexion,$consulta) or die ("Error de Registro");

mysqli_close($conexion);
?>