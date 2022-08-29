<?php

$inc = include('database/conexion.php');
$consultaPe= "SELECT * FROM `pedido` ORDER BY 'CVE_PEDIDO' DESC LIMIT 1 ";
$resultadoPe = mysqli_query($conexion,$consultaPe);
$mostrarPe = mysqli_fetch_array($resultadoPe);
$idPe = $mostrarPe['CVE_PEDIDO'] + 1;

echo $idPe;

/*Variables Recibidas*/

$cliente = $_POST['txtNombre'];
$pedido = $_POST['txtEP'];
$cantidad = $_POST['txtCantidad'];
$fechaC = $_POST['txtFechaC'];
$fechaE = $_POST['txtFechaE'];
$precio = 0;

$consulta_1 = "INSERT INTO `pedido`(`CVE_PEDIDO`, `CVE_ESTADO`, `CANTIDAD`, `FECHA_CREACION`, `FECHA_ENTREGADO`, `CLIENTE`, `PRECIO`) 
VALUES ('$idPe','$pedido','$cantidad','$fechaC','$fechaE','$cliente','$precio')";

$resultado=mysqli_query($conexion,$consulta_1);

if ($resultado) {
    echo " <script> alert('Se ha añadido el pedido con exito.'); 
    window.location='../layout/crear_pedido.php' </script>";
}

mysqli_close($conexion);

?>