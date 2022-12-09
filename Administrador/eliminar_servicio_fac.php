<?php
session_start();
if (!isset($_SESSION['admin'])) {
  # code...
  echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../../login1.php";
    </script>
    ';

  session_destroy();
  //header("location:../login1.php");
  //die();
}

include('../conecta.php');
$id_serv = $_REQUEST['id_ser'];

$sql = "DELETE FROM det_factura WHERE id = $id_serv";

if (mysqli_query($conn, $sql)) {
  echo '
  <script>
  //alert("Servicio eliminado exitosamente");
  window:location = "detalles_factura.php";
  </script>
  ';
} else {
  echo "Error al eliminar el servicio " . mysqli_error($conn);
}

mysqli_close($conn);
