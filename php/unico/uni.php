<?php

include('../database/conexion.php');

$sql1= "SELECT tp.NOMBRE as N, m.MEDIDA as M FROM `tipo_medida` as tm, `tipo_ropa` as tp, `medidas` as m 
WHERE tm.CVE_MEDIDA = m.CVE_MEDIDA AND tm.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA AND tm.CVE_TIPO_ROPA  = 7 ";

$consul1 = mysqli_query($conexion,$sql1);




/*$datos = [ "id"=>  ];   */
$row = mysqli_num_rows($consul1);

echo $row;



?>