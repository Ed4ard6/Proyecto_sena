<?php
include('../conecta.php');
$id_factura = $_REQUEST['id_factura'];

$sql = "UPDATE factura SET estado = 'CANCELADA' WHERE id_factura = $id_factura";


if (mysqli_query($conn, $sql)){

  echo '
    <script>
    alert("Cancelacion exitosa");
    window.location="CRUD_Fact/listafacturas.php";
    </script>
    ';
  
}
mysqli_close($conn);
