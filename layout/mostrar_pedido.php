<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['usuario'];
  if($varsesion==null || $varsesion='') {
    echo " <script> alert('No tienes acceso.'); 
    window.location='../index.php' </script>";
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Lista Pedido | Rochy</title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/mostrar.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">
    <?php include('sidebars.php') ?>


    <h3>Pedido</h3>
    <?php
        $inc = include('../php/database/conexion.php');
        $sql = "SELECT r.CVE_ROPA as ID, r.CLIENTE as CLIENTE, tr.NOMBRE as ROPA, tp.TIPO_TELA as TELA, R.FECHA_CREACION as CREACION, r.FECHA_ENTREGADO as ENTREGA, ep.NOMBRE as ESTADO, p.NOMBRE as EMPLEADO FROM `ropa` as r, `tipo_ropa` as tr, `tipo_de_tela` as tp, `empleado` as e, `estado_pedido` as ep, `personas` as p WHERE r.CVE_TIPO_ROPA = tr.CVE_TIPO_ROPA AND r.CVE_TIPO_TELA = tp.CVE_TIPO_TELA AND e.CVE_EMPLEADO = r.CVE_EMPLEADO AND ep.CVE_ESTADO_PEDIDO = r.CVE_ESTADO_PEDIDO AND p.CVE_PERSONA = e.CVE_EMPLEADO;";
        $resul = mysqli_query($conexion,$sql);

        while ($mostrar = mysqli_fetch_array($resul)) {           
    ?>
    <div>
        <hr>
        <div class="row mb-1">
            <h5 class="col-lg-1 m-1">Cliente:</h5>
            <p class="col-lg-8 m-1"><?php echo $mostrar['CLIENTE'] ?></p>
        </div>
        <hr>
        <div class="row">
            <h5 class="col-lg-1 m-1">Ropa:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['ROPA'] ?></p>
            <h5 class="col-lg-1 m-1">Tela:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['TELA'] ?></p>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5 m-1">
                <h5 class="">Fecha de Creacion:</h5>
                <p class=""><?php echo $mostrar['CREACION'] ?></p>
            </div>
            <div class="col-lg-5 m-1">
                <h5 class="">Fecha de Entrega:</h5>
                <p class=""><?php echo $mostrar['ENTREGA'] ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h5 class="col-lg-1 m-1">Estado:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['ESTADO'] ?></p>
            <h5 class="col-lg-2 m-1">Empleado:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['EMPLEADO'] ?>
    </div>
    <hr>
    <?php
        }
    ?>
</body>
</html>