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
    
    <!--JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
    <!--CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!--Hoja de Estilo de Idex-Custome-->
    <link rel="stylesheet" href="../css/ropa.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Agregar Pieza | Modista</title>
</head>
<body class="body" id="body">
    <?php include('sidebars.php') ?>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h4>Crear Pedido</h4>
            <hr>
        </div>
    </div>
    
    <form action="../php/agendar_l.php" method="POST">
                
                <div class=" row mb-3">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <span class="input-group-text" id="basic-addon1">Nombre del Cliente</span>
                        <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
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
                        <input type="text" name="txtCantidad" class="form-control" placeholder="Cantidad" aria-label="CURP" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!----------------------------------------------->
            <?php

            $inc = include('../php/database/conexion.php');
            $sqlf ='SELECT NOW() AS ACTUAL;';
            $consulf = mysqli_query($conexion,$sqlf);
            $mostrarf = mysqli_fetch_array($consulf);
            
            ?>
            <!----------------------------------------------->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Inicio:</span>
                        <input type="datetime-local" name="txtFechaC" value="<?php echo $mostrarf['ACTUAL'] ?>" class="form-control" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1"readonly>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Entrega:</span>
                        <input type="datetime-local" name="txtFechaE" class="form-control" placeholder="Correo Electronico" aria-label="Correo Electronico" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>    

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1 mb-3">
                        <button type="submit" class="btn btn-outline-success">Crear</button>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </div>
            
    </form>
</body>
</html>