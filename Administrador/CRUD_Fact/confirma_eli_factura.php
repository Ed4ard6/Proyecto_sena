<?php
session_start();
if (!isset($_SESSION['admin'])) {
    # code...
    echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../login1.php";
    </script>
    ';
    
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../../css/estilo_fac.css">
    <title>confirmar eliminacion</title>
    
</head>
<body>
    <div class="contenedor_confirmar_eliminar">
    <h2 class="seguro_eliminar">Eliminar !</h2><hr>
    <?php
     $id_factura = $_REQUEST["id_factura"];
    echo "Esta seguro que desea eliminar la factura con el id ". $id_factura;
    ?>
    <br />
    <br />
    <br>
    <a href="eliminarfactura.php?id_factura=<?php echo $_REQUEST["id_factura"]; ?>" class="boton_aceptar">Aceptar</a>-
    <a href="listafacturas.php" class="boton_cancelar">cancelar</a>
    </div>
</body>
</html>