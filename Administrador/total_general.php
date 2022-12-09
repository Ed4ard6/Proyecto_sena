<?php
/* include('menu_admin.php'); */
include('../conecta.php');

$sql = "SELECT det_factura.id_factura_det, det_factura.cantidad, servicios.nom_servicio, servicios.precio FROM ((det_factura 
       INNER JOIN servicios on det_factura.id_servicios_det = servicios.id_servicio) 
       INNER JOIN factura on factura.id_factura = det_factura.id_factura_det)
       where factura.estado = 'Verificado' ORDER BY det_factura.id_factura_det  desc ";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      $limite = $row['id_factura_det'];
      echo "limite = $limite <br><br>";
      /* die(); */


      $sql = "SELECT det_factura.id_factura_det, det_factura.cantidad, servicios.nom_servicio, servicios.precio FROM ((det_factura 
       INNER JOIN servicios on det_factura.id_servicios_det = servicios.id_servicio) 
       INNER JOIN factura on factura.id_factura = det_factura.id_factura_det)
       where det_factura.id_factura_det <= $limite && factura.estado = 'Verificado' ";
      $result = mysqli_query($conn, $sql);



      if (mysqli_num_rows($result) > 0) {
         $total_pagar = 0;
         $ventas = 0;
         $id = 1;
         while ($row = mysqli_fetch_assoc($result)) {
            $id_factura = $row['id_factura_det'];
            $cantidad = $row['cantidad'];
            $precio = $row['precio'];
            $total = $precio * $cantidad;
            $total_pagar = $total + $total_pagar;
            
            echo "ID_FACTURA = $id_factura <br> $cantidad  *  $precio = $total <br><br>";


            echo "el total de la factura $id_factura = $total_pagar <br>";
         }
         $ventas = $total_pagar + $ventas;
      }
   }
}
echo "EL TOTAL DE GANACIA ES: $ventas";
