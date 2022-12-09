<?php
include ("../../conecta.php");
//
//
$idfactura = $_REQUEST['id_factura'];
$fecrecibido = $_POST['fecha_recibido'];
$fecentregado= $_POST['fecha_entregado'];
$estado = $_POST['estado'];
$inf_cliente = $_POST['inf_cliente'];

$consulta = " UPDATE factura set fecha_recibido = '$fecrecibido',fecha_entregado = '$fecentregado',estado = '$estado',info_cliente_id='$inf_cliente' WHERE id_factura = '$idfactura'";
$conn->query($consulta);

if (mysqli_connect_errno() !=0)
{
    echo "Error al modificar el estudiante" . mysqli_connect_errno() . " - " . mysqli_connect_errno();
    mysqli_close($conn);
} else  {
    mysqli_close($conn);
    echo'<script>
    alert("La Actualización de la factura fue exitosa");
    window.location = "listafacturas.php"
    </script>';
}

?>