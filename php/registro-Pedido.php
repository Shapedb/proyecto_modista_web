<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');


$consultaPe= "SELECT * FROM `pedido` ORDER BY 'CVE_PEDIDO' DESC LIMIT 1 ";
$resultadoPe = mysqli_query($conexion,$consultaPe);
$mostrarPe = mysqli_fetch_array($resultadoPe);

$idPe = $mostrarPe['CVE_PEDIDO'];
 
if ($inc) {
    $consulta = "SELECT CVE_ROPA FROM `ropa` ORDER BY CVE_ROPA DESC LIMIT 1;   ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idRopa = $numero['CVE_ROPA'] + 1;
}

$nomRopa=$_POST['txtRopa'];
$nomTela=$_POST['txtTela'];
$nomFechaCreacion=$_POST['txtFeC'];
$nomFechaEntrega=$_POST['txtFeC'];
$nomEstadoP=$_POST['txtEpedido'];
$nomEmpleado=$_POST['txtEm'];



/*Insertar Datos Personales*/

$consulta_1 = "INSERT INTO `ropa`(`CVE_ROPA`, `CVE_TIPO_ROPA`, `CVE_TIPO_TELA`, `CVE_EMPLEADO`, `FECHA_CREACION`, `FECHA_ENTREGADO`, `CVE_ESTADO_PEDIDO`,`CVE_PEDIDO`)
VALUES ('$idRopa','$nomRopa','$nomTela','$nomEmpleado','$nomFechaCreacion','$nomFechaEntrega','$nomEstadoP', '$idPe')";


$resultado2 = mysqli_query($conexion,$consulta_1);

if ($resultado2) {
    echo " <script> alert('Se ha añadido el Pedido con exito.'); 
    window.location='../layout/agre-medidas.php' </script>";
}

mysqli_close($conexion);
?>