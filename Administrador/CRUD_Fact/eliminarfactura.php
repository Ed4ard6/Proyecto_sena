<?php

include("../../conecta.php");


$idfactura=$_REQUEST['id_factura'];

$sql="UPDATE factura set estado = 'CANCELADA'  WHERE id_factura=$idfactura";
$query=mysqli_query($conn,$sql);


if (mysqli_connect_errno() !=0)
 {
    echo "Error al eliminar Factura" . mysqli_connect_errno() . " - " . mysqli_connect_error();
    mysqli_close($conn);
 } else {
    
    mysqli_close($conn);
    
    echo '
    <script>
    alert("La eliminacion fue exitosa");
    window.location = "listafacturas.php"
    </script>';
 }
?>