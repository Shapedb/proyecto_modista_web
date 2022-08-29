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
    <title>Listar Pedidos | Rochy</title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/mostrar.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">
    <?php include('sidebars.php') ?>
    <h3>Pedidos</h3>
    <?php
        $inc = include('../php/database/conexion.php');
        $sql = "SELECT p.CVE_PEDIDO as ID, e.NOMBRE as Estado, p.CANTIDAD as Cant, p.FECHA_CREACION as FC, p.FECHA_ENTREGADO as FP, p.CLIENTE as CLIENTE FROM `pedido` AS p, `estado` as e WHERE e.CVE_ESTADO = p.CVE_ESTADO; ";
        $resul = mysqli_query($conexion,$sql);
        

        
        while ($mostrar = mysqli_fetch_array($resul)) { 
        $CVER = $mostrar['ID'];          
    ?>
        <hr>
        <div class="row">   
            <h5 class="col-lg-1 m-1">Cliente:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['CLIENTE'] ?></p>
            <h5 class="col-lg-3 m-1">Estado Actual:</h5>
            <p class="col-lg-3 m-1"><?php echo $mostrar['Estado'] ?></p>
        </div>
        <hr>
        <div class="row">
            <h5 class="col-lg-4 m-1">Cantidad de Ropa:</h5>
            <p class="col-lg-2 m-1"><?php echo $mostrar['Cant'] ?></p>
        </div>
        <hr>
        <div class="row">
            <h5 class="col-lg-2 m-1">Fecha de Inicio:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['FC'] ?></p>
        </div>
        <hr>
        <div class="row">
            <h5 class="col-lg-2 m-1">Fecha de Entrega:</h5>
            <p class="col-lg-4 m-1"><?php echo $mostrar['FP'] ?>
        </div>
        <hr>
        <h5>Medidas</h5>
        <?php
        
        $mi = "SELECT r.CVE_ROPA AS IDR, tp.NOMBRE as TROPA, pe.NOMBRE as EMPLEADO, ep.NOMBRE as EPEDIDO, tt.TIPO_TELA as TTELA, p.CVE_PEDIDO as IDP FROM `ropa` AS r, `tipo_ropa` AS tp, `empleado` AS e, `estado_pedido` AS ep, `tipo_de_tela` AS tt, `pedido` AS p , `personas` as pe WHERE r.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA AND r.CVE_EMPLEADO = e.CVE_EMPLEADO AND ep.CVE_ESTADO_PEDIDO = r.CVE_ESTADO_PEDIDO AND r.CVE_TIPO_TELA = tt.CVE_TIPO_TELA AND r.CVE_PEDIDO = p.CVE_PEDIDO AND e.CVE_EMPLEADO = pe.CVE_PERSONA;";
        $resul1 = mysqli_query($conexion,$mi);
        
        while ($mostrar1 = mysqli_fetch_array($resul1)) {           
        
        ?>
        
        <div class=" row mb-1 ">
            <div class="col-lg-2">
                <h6 class="fw-bold">Tipo de Ropa</h5>
                <p><?php echo $mostrar1['TROPA'] ?></p>
            </div>
            <div class="col-lg-2">
                <h6 class="fw-bold">Costurera</h5>
                <p><?php echo $mostrar1['EMPLEADO'] ?></p>
            </div>
            <div class="col-lg-2">
                <h6 class="fw-bold">Estado</h5>
                <p><?php echo $mostrar1['EPEDIDO'] ?></p>
            </div>
            <div class="col-lg-2">
                <h6 class="fw-bold">Tipo de Tela</h5>
                <p><?php echo $mostrar1['TTELA'] ?></p>
            </div>
        </div>
        

        <?php
            }
        ?>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <div><a href="editar-agenda.php?id=<?php echo $CVER?>" class="btn btn-outline-success ">Editar Pedidos</a></div>
            </div>
            <div class="col-lg-3">
                <form action="mostrar_pedido.php" method="GET">
                   <input type="hidden" value="<?php echo $CVER?>" name="txtIDEM"readonly>
                   <button type="submit" class="btn btn-outline-success">Ver Piezas</button>
                </form>
            </div>
            <div class="col-lg-2">
                <form action="../php/eliminar/agendar.php" method="POST">
                   <input type="hidden" value="<?php echo $CVER?>" name="txtIDEM"readonly>
                   <button type="submit" class="btn btn-outline-danger ">Eliminar</button>
                </form>
            </div>
        </div>
    <hr>
    
    <?php
        }
    ?>
</body>
</html>