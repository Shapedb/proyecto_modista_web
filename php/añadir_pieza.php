<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');

$idp = $_POST['idp'];

if ($inc) {
    $consulta = "SELECT CVE_ROPA FROM `ropa` ORDER BY CVE_ROPA DESC LIMIT 1;   ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idRopa = $numero['CVE_ROPA'] + 1;
}

$nomRopa=$_POST['txtRopa'];
$nomTela=$_POST['txtTela'];
$nomEstadoP=$_POST['txtEpedido'];
$nomEmpleado=$_POST['txtEm'];

/*-------------*/
$consultaPe= "SELECT * FROM `pedido` WHERE CVE_PEDIDO = '$idp' ";
$resultadoPe = mysqli_query($conexion,$consultaPe);
$mostrarPe = mysqli_fetch_array($resultadoPe);

$c = $mostrarPe['CANTIDAD'] + 1;

echo $c;

$ud = "UPDATE `pedido` SET `CANTIDAD`='$c' WHERE CVE_PEDIDO = '$idp';";
mysqli_query($conexion,$ud);


/*Insertar Datos Personales*/

$consulta_1 = "INSERT INTO `ropa`(`CVE_ROPA`, `CVE_TIPO_ROPA`, `CVE_TIPO_TELA`, `CVE_EMPLEADO`, `CVE_ESTADO_PEDIDO`,`CVE_PEDIDO`)
VALUES ('$idRopa','$nomRopa','$nomTela','$nomEmpleado','$nomEstadoP', '$idp')";


$resultado2 = mysqli_query($conexion,$consulta_1);

if ($resultado2) {
    echo " <script> alert('Se ha añadido la nueva pieza con exito.'); 
    window.location='../layout/agre-medidas.php' </script>";
}

mysqli_close($conexion);
?>