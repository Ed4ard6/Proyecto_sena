<?php
include('../conecta.php');

$documento = $_POST['doc'];
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$correo = $_POST['email'];
$num_celular = $_POST['numero'];
$direccion = $_POST['direccion'];
$imagen = $_FILES['foto']['tmp_name'];

if (!empty($imagen)) {

  $tamaño_img = $_FILES['foto']['size'];

  $leer_imagen = fopen($imagen, "r");

  $conversion_imagen = fread($leer_imagen, $tamaño_img);

  $conversion_imagen = addslashes($conversion_imagen);

  $sql = "UPDATE usuarios SET  nombres='$nombres',apellidos='$apellidos', 
  correo = '$correo', num_celular = '$num_celular', direccion = '$direccion', imagen = '$conversion_imagen'  WHERE documento = $documento";
  $query = mysqli_query($conn, $sql);
  
  if ($query) {
  ?><script>
          window.location = "Location:mi_cuenta_admi.php";
      </script><?php
      Header("Location:mi_cuenta_admi.php");
               }
} else {
    $sql = "UPDATE usuarios SET  nombres='$nombres',apellidos='$apellidos', 
    correo = '$correo', num_celular = '$num_celular', direccion = '$direccion'  WHERE documento = $documento";
    $query = mysqli_query($conn, $sql);
    
    if ($query) {
    ?><script>
            window.location = "Location:mi_cuenta_admi.php";
        </script><?php
        Header("Location:mi_cuenta_admi.php");
                 }
}

