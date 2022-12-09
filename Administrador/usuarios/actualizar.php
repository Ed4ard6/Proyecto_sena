<?php
include('../../conecta.php');

$id = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];

mysqli_query($conn, "UPDATE `usuarios` SET `nombres` = '$nombre', `apellidos` = '$apellido', `usuario` = '$usuario', `contraseña` = '$contraseña', `correo` = '$correo',  `num_celular` = '$celular', `direccion` = '$direccion' WHERE `documento` = '$id'") or die("error de actualizar");
mysqli_close($conn);
?>
<script>
    window.location = "usuarios.php";
</script>