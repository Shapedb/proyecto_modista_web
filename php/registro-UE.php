<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');
 
if ($inc) {
    $consulta = "SELECT CVE_PERSONA FROM `personas` ORDER BY CVE_PERSONA DESC LIMIT 1;  ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idPersona = $numero['CVE_TIPO_ROPA'] + 1;
}

$nomNombre=$_POST[''];
$nomAPaterno=$_POST[''];
$nomAMaterno=$_POST[''];
$nomTel=$_POST[''];
$nomCElectronico=$_POST[''];
$nomTipoEm=$_POST[''];
$nomCurp=$_POST[''];
$nomUsuario=$_POST[''];
$nomTiUsu=$_POST[''];
$nomContraseña=$_POST[''];


/*Insertar Datos Personales*/

$consulta_1 = "INSERT INTO `personas`(`CVE_PERSONA`, `NOMBRE`, `APELLIDO_PAT`, `APELLIDO_MAT`, `TELEFONO`, `CORREO_ELECTRONICO`) 
VALUES (' $idPersona','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')";

/*Insertar Datos de Empleado*/

$consulta_2 = "INSERT INTO `empleado`(`CVE_EMPLEADO`, `CVE_TIP_EMPLEADO`, `CURP`)
VALUES (' $idPersona','[value-2]','[value-3]')";

/*Insertar Datos de Usuario*/

$consulta_3 = "INSERT INTO `usuario`(`CVE_USUARIO`, `USUARIO`, `CVE_TIPO_USUARIO`, `CONTRASENA`) 
VALUES (' $idPersona','[value-2]','[value-3]','[value-4]'))";



$resultado_1=mysqli_query($conexion,$consulta_1);

$resultado_2=mysqli_query($conexion,$consulta_2);

$resultado_3=mysqli_query($conexion,$consulta_3);


if ($resultado_1) {
    echo " <script> alert('Se ha añadido al Usuario con exito.'); 
    window.location='../layout/administarar-usuarios.php' </script>";
}


mysqli_close($conexion);
?>