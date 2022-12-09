<?php include('menu_admin.php');

$idfactura = $_REQUEST['id'];

$sql = "SELECT * FROM factura WHERE id_factura='$idfactura'";
$query = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($query);
?>
<!-- Inicio editar factura-->
<div class="contenedor_editar_factura">
    <h1>Actualizar factura</h1>
    <form action="gua_editar_fac.php" method="POST">

        <td>Id Factura</td><br>
        <input type="text" readonly name="id_factura" class="casillas_actualizar" value="<?php echo $row['id_factura']  ?>"><br><br>
        <td>Fecha recibido</td><br>
        <input type="date" name="fecha_recibido" placeholder="Fecha de recibido" class="casillas_actualizar" value="<?php echo $row['fecha_recibido']  ?>"><br><br>
        <td>Fecha entregado</td><br>
        <input type="date" name="fecha_entregado" placeholder="Fecha de entrega" class="casillas_actualizar" value="<?php echo $row['fecha_entregado']  ?>"><br><br>
        <td>Estado</td><br>
        <select class="casillas_actualizar" name="estado" id="estado">
            <option value="Verificado">Verificada</option>
            <option value="CANCELADA">Calcelada</option>

        </select><br>
        <br>
        <td>Documento Cliente</td><br>
        <input type="text" readonly name="inf_cliente" placeholder="Introduzca documento" class="casillas_actualizar" value="<?php echo $row['info_cliente_id']  ?>"><br><br><br>
        <td>&nbsp;</td>
        <td><input name="enviar" type="submit" id="enviar" value="Actualizar" class="boton_actualizar" /></td><br>

    </form>

</div>
<!--Fin actualizar factura-->
<?php include('pie_pagina.php'); ?>