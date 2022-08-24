<?php
$inc = include('database/conexion.php');

$sql = "SELECT CVE_TIPO_ROPA FROM `ropa` ORDER BY CVE_ROPA DESC LIMIT 1;";

$consul = mysqli_query($conexion,$sql);
$mostrar = mysqli_fetch_array($consul);

$va = $mostrar['CVE_TIPO_ROPA'];


$sql1= "SELECT tp.NOMBRE as N, m.MEDIDA as M FROM `tipo_medida` as tm, `tipo_ropa` as tp, `medidas` as m 
WHERE tm.CVE_MEDIDA = m.CVE_MEDIDA AND tm.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA AND tm.CVE_TIPO_ROPA  = '$va'";

$consul1 = mysqli_query($conexion,$sql1);
$mostrar1 = mysqli_fetch_array($consul1);
$p = array();

echo $mostrar['M'];

while ($mostrar1 = mysqli_fetch_array($consul1)) {
     
     
     $p[] = $mostrar['M'];
}

while ($mostrar1 = mysqli_fetch_array($consul1)) {
     
}
print_r($p);
?>