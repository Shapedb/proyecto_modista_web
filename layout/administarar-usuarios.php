<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Administrar Usuario | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/ropa.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>

        <h1>Usuarios</h1>

        <hr>
        <div class="d-flex justify-content-center">
        <table class="table w-100">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $inc = include('../php/database/conexion.php');
                    $sql = "SELECT u.CVE_USUARIO ,p.NOMBRE, p.APELLIDO_PAT,p.APELLIDO_MAT,u.USUARIO,tu.TIPO ,u.CONTRASENA FROM `usuario` as u, `tipo_usuario` as tu, `personas` as p WHERE P.CVE_PERSONA = U.CVE_USUARIO and u.CVE_TIPO_USUARIO = tu.CVE_TIPO_USUARIO AND U.CVE_USUARIO != 0";
                    $resul = mysqli_query($conexion,$sql);

                    while ($mostrar = mysqli_fetch_array($resul)) {
                    
                   
                ?>
                <tr>
                    <td><?php echo $mostrar['NOMBRE'] ?></td>
                    <td><?php echo $mostrar['APELLIDO_PAT'] ?></td>
                    <td><?php echo $mostrar['APELLIDO_MAT'] ?></td>
                    <td><?php echo $mostrar['USUARIO'] ?></td>
                    <td><?php echo $mostrar['TIPO'] ?></td>
                    <td><?php echo $mostrar['CONTRASENA'] ?></td>
                    <td><input class="btn btn-outline-success" type="submit" value="Editar"></td>
                        <td>
                                 <form action="../php/eliminar/usuario.php" method="POST">
                                    <input type="hidden" value="<?php echo $mostrar['CVE_USUARIO']?>" name="txtIDEM"readonly>
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                 </form>
                        </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
</body>
</html>