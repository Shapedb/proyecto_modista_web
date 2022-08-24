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
    <title>Crear Pedido | Modista</title>
</head>
<body class="body" id="body">
    <?php include('sidebars.php') ?>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h4>Crear Pedidos</h4>
            <hr>
        </div>
    </div>
    
    <form>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">Nombre del Cliente</span>
                    <input type="text" name="txtNombreC" class="form-control" placeholder="Nombre del Cliente" aria-label="Nombre" aria-describedby="basic-addon1">
                </div>
            </div>

        </div>
        <div class="row" action="../php/registro-UE.php" method="POST">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Ropa </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtRopa">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_empleado`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIP_EMPLEADO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Tela. </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtTela">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_empleado`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIP_EMPLEADO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
        </div>
        <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Creación</span>
                        <input type="datetime-local" name="txtFeC" class="form-control" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1">
                    </div>
                </div>
                <?php ?>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Entrega</span>
                        <input type="datetime-local" name="txtFeE" class="form-control" placeholder="Correo Electronico" aria-label="Correo Electronico" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-2"></div>
        </div>
        <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Estado del Pedido </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEpedido">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_empleado`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIP_EMPLEADO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Empleado a Cargo. </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEm">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_empleado`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIP_EMPLEADO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1 mb-3">
                        <button type="submit" class="btn btn-outline-success">Agregar</button>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </div>
        </div>
    </form>
</body>
</html>