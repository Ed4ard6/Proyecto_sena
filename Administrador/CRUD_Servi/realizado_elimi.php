<?php
session_start();
include ('../../conecta.php');
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