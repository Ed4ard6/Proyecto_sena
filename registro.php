<?php
include("conecta.php");

$num_cedula     =  $_REQUEST['documento'];
$nombre         =  $_REQUEST['nombre'];
$apellido       =  $_REQUEST['apellido'];
$usuario        =  $_REQUEST['usuario'];
$contraseña     =  $_REQUEST['contraseña'];
$correo         =  $_REQUEST['email'];
$num_celular    =  $_REQUEST['telefono'];
$direccion      =  $_REQUEST['direccion'];
$c_contraseña   =  $_REQUEST['c_clave'];
$imagen = $_FILES['imagen']['tmp_name'];

if (!empty($imagen)) {

  $tamaño_img = $_FILES['imagen']['size'];

  $leer_imagen = fopen($imagen, "r");

  $conversion_imagen = fread($leer_imagen, $tamaño_img);

  $conversion_imagen = addslashes($conversion_imagen);
} else {
  $conversion_imagen = null;
}






if ($contraseña !== $c_contraseña) {
  # code...
  echo ' 
    <script>
    alert("Las contraseñas no coinciden");
    window.location = "registrarse.php";
    </script>
    ';
}

// $_REQUEST se utiliza para recopilar datos despues de enviar un formulario html

include('conecta.php');

$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo ' 
    <script>
    alert("Nombre de usuario en uso \nPor favor utilice otro");
    window.location = "registrarse.php";
    </script>
    ';
}

$sql = "SELECT documento FROM usuarios WHERE documento = $num_cedula;;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  echo ' 
    <script>
    alert("Ya se encuentra alguien registrado con ese numero de documento \n                                   Por favor inicie sesion");
    window.location = "login1.php";
    </script>
    ';
}

$sql = "INSERT INTO usuarios(documento, nombres, apellidos, usuario, contraseña, correo, num_celular, direccion, tipo_usuario, imagen)
VALUES ($num_cedula,'$nombre','$apellido','$usuario','$contraseña','$correo',$num_celular,'$direccion','C','$conversion_imagen');";

if (mysqli_query($conn, $sql)) {
  echo '
    <script>
    alert("Registro exitoso");
    window.location = "login1.php";
    </script>
    
    ';
}
mysqli_close($conn);
