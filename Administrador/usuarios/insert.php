<?php include('menu_admin.php');  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>

<body>
    <?php
    //cuado le de clik en el boton de guardar ejecutar la accion
    if (isset($_POST['guardar'])) {
        //creo variables
        $documento = mysqli_real_escape_string($conn, (strip_tags($_POST["documento"], ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($conn, (strip_tags($_POST["nombre"], ENT_QUOTES)));
        $apellido = mysqli_real_escape_string($conn, (strip_tags($_POST["apellido"], ENT_QUOTES)));
        $usuario = mysqli_real_escape_string($conn, (strip_tags($_POST["usuario"], ENT_QUOTES)));
        $contraseña = mysqli_real_escape_string($conn, (strip_tags($_POST["contraseña"], ENT_QUOTES)));
        $correo = mysqli_real_escape_string($conn, (strip_tags($_POST["correo"], ENT_QUOTES)));
        $celular = mysqli_real_escape_string($conn, (strip_tags($_POST['celular'], ENT_QUOTES)));
        $direccion = mysqli_real_escape_string($conn, (strip_tags($_POST['direccion'], ENT_QUOTES)));

        //validacion de documento que no se repita
        $verificar_documento = mysqli_query($conn, "SELECT * FROM usuarios WHERE documento='$documento'");
        if (mysqli_num_rows($verificar_documento) > 0) {
            echo '
            <script>
            alert("Este documento ya fue registrado, intenta de nuevo");
            window.location = "insert.php";
            </script>';
        }
        //validacion de usuario que no se repita
        $verificar_usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario'");
        if (mysqli_num_rows($verificar_usuario) > 0) {
            echo '
            <script>
            alert("Este usuario ya fue registrado, intenta de nuevo");
            window.location = "insert.php";
            </script>';
        }
        //almaceno las variable 
        $insert = mysqli_query($conn, "INSERT INTO usuarios(documento, nombres, apellidos, usuario, contraseña, correo, num_celular, direccion) VALUES ('$documento','$nombre', '$apellido', '$usuario', '$contraseña', '$correo', '$celular', '$direccion')");
        //validacion 
        if ($insert) {
            echo '
            <script>
            alert("Usuario creado correctamente");
            window.location = "usuarios.php";
            </script>';
        }
    }
    ?>
    <div class="contenedor">
        <h2>Nuevo usuario</h2>
        <form method="post">
            <div class="form-group">
                <label for="">Documento</label>
                <label for="">Nombre</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="number" name="documento" id="documento" placeholder="ingresar documento" required>
                <input class="input_text" type="text" name="nombre" placeholder="ingresar nombres" required>
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <label for="">Usuario</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="text" name="apellido" placeholder="Ingresar apellidos" required>
                <input class="input_text" type="text" name="usuario" placeholder="Ingresar usuario" required>
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <label for="">Correo</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="text" name="contraseña" placeholder="Ingresar contraseña" required>
                <input class="input_text" type="email" name="correo" placeholder="Ingresar correo" required>
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <label for="">Direccion</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="number" name="celular" placeholder="Ingresar numero de celular" required>
                <input class="input_text" type="text" name="direccion" placeholder="Ingresar direccion" required>
            </div>
            <div class="btn__group">
                <a href="usuarios.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="guardar" value="guardar" class="btn btn__primary">
            </div>
        </form>
    </div>
    </div>
    </div>
</body>

</html>
<?php include('pie_pagina.php'); ?>