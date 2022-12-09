<?php
include ('../../conecta.php');

$id_servicio= $_GET['id'];

$sql = "UPDATE servicios set estado = 'Inactivo' WHERE id_servicio='$id_servicio'";


$resulatado = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo '
    <script>
    alert("SERVICIO ELIMINADO EXITOSAMENTE");
    window:location = "elimi_servi.php";
    </script>';

} else {
  echo "Error creating database: " . mysqli_error($conn);
}
?>