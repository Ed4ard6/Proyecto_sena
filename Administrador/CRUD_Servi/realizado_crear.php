<?php
session_start();
include('../../conecta.php');
if (!isset($_SESSION['admin'])) {
    echo "hola";
    # code...
    echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../../login1.php";
    </script>
    ';
    
    session_destroy();

}

$id_admin= 1;
$imagen= $_FILES['imagen']['tmp_name'];
$nom_servicio= $_POST['nom_servicio'];
$precio= $_POST['precio'];
$peso= $_POST['peso'];
$descripcion= $_POST['descripcion'];

$tamaño_img= $_FILES['imagen']['size'];

$leer_imagen= fopen($imagen,"r");

$conversion_imagen= fread($leer_imagen,$tamaño_img);

$conversion_imagen= addslashes($conversion_imagen);


    
$sql= "INSERT INTO servicios (nom_servicio, precio, peso,descripcion,info_admin_id,imagen) 
VALUES ('$nom_servicio', '$precio','$peso' ,'$descripcion','$id_admin','$conversion_imagen')";
    
    if (mysqli_query($conn, $sql)) {
        echo 
        '<script>
        alert("SERVICIO GENERADO CORRECTAMENTE");
        window:location = "modificar_servicio.php";
        </script>';

    } else {
      echo "Error creating the services: " . mysqli_error($conn);
    }
?>