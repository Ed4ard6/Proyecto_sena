<?php
include('../../conecta.php');
$id = $_GET['id'];
$select = "SELECT *  FROM usuarios WHERE documento='$id'";
$data = mysqli_query($conn, $select);
$row = mysqli_fetch_array($data);

?>
<?php include('menu_admin.php'); ?>
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
    <div class="contenedor">
        <h2>Actualizar usuario</h2>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="">Documento</label>
                <label for="">Nombre</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="number" name="documento" id="documento" placeholder="ingresar documento" value="<?php echo $row['documento'] ?>" readonly>
                <input class="input_text" type="text" name="nombre" placeholder="ingresar nombre" value="<?php echo $row['nombres'] ?>" required>
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <label for="">Usuario</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="text" name="apellido" placeholder="Ingresar apellido" value="<?php echo $row['apellidos'] ?>" required>
                <input class="input_text" type="text" name="usuario" placeholder="Ingresar usuario" value="<?php echo $row['usuario'] ?>" required>
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <label for="">Correo</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="text" name="contraseña" placeholder="Ingresar contraseña" value="<?php echo $row['contraseña'] ?>" required>
                <input class="input_text" type="email" name="correo" placeholder="Ingresar correo" value="<?php echo $row['correo'] ?>">
            </div>
            <div class="form-group">
                <label for="">Celular</label>
                <label for="">Direccion</label>
            </div>
            <div class="form-group">
                <input class="input_text" type="number" name="celular" placeholder="Ingresar numero de celular" value="<?php echo $row['num_celular'] ?>" required>
                <input class="input_text" type="text" name="direccion" placeholder="Ingresar direccion" value="<?php echo $row['direccion'] ?>" required>
            </div>
            <div class="btn__group">
                <a href="usuarios.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="update_btn" value="Actualizar" class="btn btn__primary">
            </div>
        </form>
    </div>
</body>

</html>
<?php include('pie_pagina.php'); ?>