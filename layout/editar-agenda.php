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
    <title> Editar Pedido | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/ropa.css">
    <link rel="shortcut icon" href="../img/logo.png">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>


        <h1>Editar Pedido</h1>
        <?php
            include('../php/database/conexion.php');
            $op = $_GET['id'];
            $inc = include('../php/database/conexion.php');
            $sql = "SELECT p.CVE_PEDIDO as ID, e.NOMBRE as Estado, p.CANTIDAD as Cant, p.FECHA_CREACION as FC, p.FECHA_ENTREGADO as FP, p.CLIENTE as CLIENTE, p.PRECIO as PRECIO  FROM `pedido` AS p, `estado` as e WHERE e.CVE_ESTADO = p.CVE_ESTADO AND p.CVE_PEDIDO = $op; ";
            $resul = mysqli_query($conexion,$sql);
            $mostrarp = mysqli_fetch_array($resul);
        ?>  

        <form action="../php/actualizar/agendar.php" method="POST">
                <hr>
                <input type="hidden" name="idpi" value="<?php echo $mostrarp['ID']?>">
                <div class=" row mb-3">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <span class="input-group-text" id="basic-addon1">Nombre del Cliente</span>
                        <input type="txt" name="txtNombre" value="<?php echo $mostrarp['CLIENTE'] ?>" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>
                </div>


                <div class="row" >
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Estado del Pedido </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEP">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `estado` WHERE CVE_ESTADO != 0';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_ESTADO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Cantidad</span>
                        <input type="text" name="txtCantidad" value="<?php echo $mostrarp['Cant'] ?>" class="form-control" placeholder="Cantidad" aria-label="CURP" aria-describedby="basic-addon1" readonly>
                    </div>
                </div>
            </div>
            <!----------------------------------------------->
            <!----------------------------------------------->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Inicio:</span>
                        <input type="datetime-local" name="txtFechaC" value="<?php echo $mostrarp['FC'] ?>" class="form-control" placeholder="Telefono" aria-describedby="basic-addon1" readonly>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Entrega:</span>
                        <input type="datetime-local" name="txtFechaE" value="<?php echo $mostrarp['FP'] ?>" class="form-control" placeholder="Correo Electronico" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class=" row mb-3">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <span class="input-group-text" id="basic-addon1">Precio</span>
                    <input type="text" name="txtPrecio" value="<?php echo $mostrarp['PRECIO'] ?>" class="form-control" placeholder="Precio" aria-label="Nombre" aria-describedby="basic-addon1">
                </div>
            </div> 
              

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1 mb-3">
                        <button type="submit" class="btn btn-outline-success">Actualizar</button>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </div>
                
            
    </form>
</body>
</html>