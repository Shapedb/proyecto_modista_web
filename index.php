<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fuentes del Archivo-->
    <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet"> 
    <!--Hoja de Estilos Global-->
    <link rel="stylesheet" href="css/styles_global.css">
    <!--Hoja de Estilos Barra de Navegacion En Linea-->
    <link rel="stylesheet" href="css/nav_unitario.css">
    <link rel="shortcut icon" href="img/logo.png">
    <title>Modista Rochy | Iniciar Sesion</title>
</head>
<body >
    <!--Barra de Nacegacion-->
    <main class="body-l" >
    
        <div class="" >
            <form class="formulario" action="validar.php" method="POST">
            <fieldset class="fieldset">
                <legend class="legend">Iniciar Sesion</legend>
                <div class="contenedor-input">
                    <label class="label" for="">Usuario:</label>
                    <input class="Input_T_CajaT" type="text" placeholder="Usuario" name="usuario">
                </div>
                <div class="contenedor-input">
                    <label class="label" for="">Contraseña:</label>
                    <input class="Input_T_CajaT" type="password" placeholder="Contraseña" name="password">
                </div>
                <div class="campo-de-botones">
                    <div class="contenedor-input">
                        <input class="boton" type="submit" value="Iniciar">
                    </div>
                    <div class="contenedor-input">
                        <input class="boton" type="reset" value="Cancelar">
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
</body>
</html>