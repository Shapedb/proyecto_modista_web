<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear Usuario | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/ropa.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>

        <h1>Añadir Usuarios</h1>

        <hr>
        <form action="../php/registro-UE.php" method="POST">
            <h5>Datos Personales</h5>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
                <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Apellido Paterno</span>
                        <input type="text" name="txtAPaterno" class="form-control" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Apellido Materno</span>
                        <input type="text" name="txtAMaterno" class="form-control" placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Telefono</span>
                        <input type="text" name="txtTelefono" class="form-control" placeholder="Telefono" aria-label="Telefono" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Correo Electronico</span>
                        <input type="text" name="txtCorreo" class="form-control" placeholder="Correo Electronico" aria-label="Correo Electronico" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
            <h5>Datos de Empleado</h5>
            <div class="row" >
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Empleado </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtTipoEm">
                        
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
                <div class="col-lg-6">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">CURP</span>
                        <input type="text" name="txtCURP" class="form-control" placeholder="CURP" aria-label="CURP" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
            <h5>Datos del Usuario</h5>
            <div class= row>
                <div class=" col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Usuario</span>
                        <input type="text" name="txtUsuario" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Usuario </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtTiUsu">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_usuario`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIPO_USUARIO'] ?>"><?php echo $mostrar['TIPO'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div calss="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input type="text" name="txtContraseña" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-1 mb-3">
                    <button type="submit" class="btn btn-outline-success">Agregar</button>
                </div>
                <div class="col-lg-1 mb-3">
                    <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                </div>
            </div>
        </form>
</body>
</html>