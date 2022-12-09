<?php
session_start();
if (!isset($_SESSION['admin'])) {
  echo ' 
       <script>
       alert("Por favor debes iniciar sesion");
       window.location = "../../login1.php";
       </script>
       ';

  session_destroy();
}
include('../conecta.php');

$id_fact = $_POST['id_factura'];
$servicio = $_POST['servicio'];
$cantidad = $_POST['cantidad'];


$sql = "SELECT precio FROM servicios WHERE nom_servicio = '$servicio'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $precio = $row['precio'];
  }
}
$total = $cantidad * $precio;

$sql = "INSERT INTO det_factura( id_fact_det, nom_ser, precio, cantidad, total) VALUES ( $id_fact, '$servicio', $precio, $cantidad, $total)";
$query = mysqli_query($conn, $sql);

$sql = "SELECT total FROM factura WHERE id_factura = '$id_fact'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $total_factura = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $totales = $row['total'];
    $total_factura = $totales + $total;
  }
}
$sql = "UPDATE factura SET  total='$total_factura' WHERE id_factura = $id_fact";
$query = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
  echo '
        <script>
        //alert("Detalle registrado exitosamente");
        window:location = "detalles_factura.php";
        </script>';
} else {
  echo "Error al insertar datos:  " . mysqli_error($conn);
}

mysqli_close($conn);
