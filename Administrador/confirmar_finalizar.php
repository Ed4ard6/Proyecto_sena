<?php
include('../conecta.php');
$id_f = $_REQUEST['numero'];

$sql = "SELECT * FROM det_factura WHERE id_fact_det = $id_f";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '
<script>
alert("Finalizacion exitosa");
window.location="CRUD_Fact/listafacturas.php"
</script>
';

  }
} else {
    echo '
    <script>
    alert("Debe agregar almenos un detalle para finalizar");
    window.location="detalles_factura.php"
    </script>
    ';
}

mysqli_close($conn);
