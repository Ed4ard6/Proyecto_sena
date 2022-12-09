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

$documento = $_POST['id_cli'];
$f_recibido = $_POST['fecha_recibido'];
$f_entrega = $_POST['fecha_entrega'];

$sql = "SELECT documento, nombres, apellidos FROM usuarios WHERE documento = $documento ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {

    $sql = "INSERT INTO factura(fecha_recibido, fecha_entregado, estado, info_cliente_id
    ) VALUES (
    '$f_recibido', '$f_entrega', 'Verificado', $documento)";

    if (mysqli_query($conn, $sql)) {
      echo '
        <script>
        window:location = "detalles_factura.php";
        </script>';
    } else {
      echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
} else {
  echo '
  <script>
  alert("No existe ningun cliente con ese ID");
  window:location = "generar_factura.php";
  </script>';
}
