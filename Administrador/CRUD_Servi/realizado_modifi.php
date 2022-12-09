
<?php
include ('../../conecta.php');

$id_servicio= $_POST['id'];
$imagen= $_FILES['imagen']['tmp_name'];
$nom_servicio= $_POST['nombre_ser'];
$precio= $_POST['precio_ser'];
$peso= $_POST['peso_ser'];
$descripcion= $_POST['des_ser'];

$imagen_ant = "SELECT imagen FROM servicios WHERE id_servicio = '$id_servicio'";

if ($imagen=="") {
  $sql = "UPDATE servicios SET nom_servicio = '$nom_servicio', precio = '$precio', peso = '$peso', descripcion = '$descripcion'  WHERE  id_servicio = '$id_servicio'";
}

else {
  $tamaño_img= $_FILES['imagen']['size'];

$leer_imagen= fopen($imagen,"r");

$conversion_imagen= fread($leer_imagen,$tamaño_img);

$conversion_imagen= addslashes($conversion_imagen);

$sql = "UPDATE servicios SET nom_servicio = '$nom_servicio', precio = '$precio', peso = '$peso', descripcion = '$descripcion', imagen = '$conversion_imagen'  WHERE  id_servicio = '$id_servicio'";

}


/*$resulatado = mysqli_query($conn, $sql);*/

if (mysqli_query($conn, $sql)) {
    echo '
    <script>
    alert("SERVICIO MODIFICADO EXITOSAMENTE");
    window:location = "modifi_servi.php";
    </script>';

} else {
  echo "Error creating database: " . mysqli_error($conn);
}
?>