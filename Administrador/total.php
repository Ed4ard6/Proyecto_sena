<?php
/* include('menu_admin.php'); */
include('../conecta.php');

$sql = "SELECT total, id_factura FROM factura  ";
$result = mysqli_query($conn, $sql);
$ventas =0;
if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
   $total_fac = $row['total'];
   $id_fact = $row['id_factura'];
   echo "El total a pagar de la factura numero $id_fact es $total_fac <br><br>";
   $ventas = $ventas + $total_fac;

   }

}
echo "El total de las ventas es $ventas";

