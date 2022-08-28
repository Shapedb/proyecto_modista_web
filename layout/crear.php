<?php
include('../php/database/conexion.php');

$consulta1= "SELECT * FROM `pedido` ORDER BY 'CVE_PEDIDO' DESC LIMIT 1 ";
$resultado = mysqli_query($conexion,$consulta1);
$mostrar = mysqli_fetch_array($resultado);


$c = $mostrar['CANTIDAD'] - 1;

$id = $mostrar['CVE_PEDIDO'];


$consulta2 = "SELECT * FROM `prueba` ORDER BY can DESC LIMIT 1; ";

$resul = mysqli_query($conexion,$consulta2);

$mos = mysqli_fetch_array($resul);

$cve= $mos['can'] + 1;


/*Para el numero de filas*/

$consulta3 = "SELECT * FROM `prueba`; ";

$resul3 = mysqli_query($conexion,$consulta3);

/*-------------------------------------------*/




$insertar = "INSERT INTO `prueba`(`can`) VALUES ('$cve')";
mysqli_query($conexion,$insertar);

$rowcount = mysqli_num_rows($resul3);

echo $rowcount;
echo $c;

if ($rowcount < $c){
    echo " <script> alert('Se ha añadido la nueva ropa con exito.'); 
    window.location='crear.php' </script>";
}
else {
    echo " <script> alert('Se ha añadido la nueva ropa con exito.'); 
    window.location='medida.php' </script>";
}
?>
*/