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
$nom_ser = $_REQUEST['nombre_servicio'];
$id_fact = $_REQUEST['id_fact'];

/* aqui consulto el total de ese detalle */
$sql = "SELECT total FROM det_factura WHERE nom_ser = '$nom_ser'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $total_det = $row['total'];
  }
}

/* Aqui encuentro el total de la factura */
$sql = "SELECT total FROM factura WHERE id_factura = $id_fact";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $total_fact = $row['total'];
  }
}
$total_factura = $total_fact -$total_det;


/*aqui elimino el detalle del servicio */
$sql = "DELETE FROM det_factura WHERE nom_ser = '$nom_ser' AND id_fact_det = $id_fact";
$query = mysqli_query($conn, $sql);

/*Aqui actualizo el total de la factura  */
$sql = "UPDATE factura SET  total='$total_factura' WHERE id_factura = $id_fact";
$query = mysqli_query($conn, $sql);

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
