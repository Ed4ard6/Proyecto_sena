<?php include('menu_admin.php');?>
    <!-- Inicio de Codigo de lista facturas-->
    
    <div class="contenedor_lista_facturas"><br>
    <div class="titulo_lista_facturas">
    <h1 class="otro_titulo_lista_factura">Lista Facturas </h1>
    </div>
    <a href="listafacturas.php" style="margin-bottom: 0.5%;" class="boton_lista">Listado Facturas</a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Fecha recibido</th>
                <th>Fecha entregado</th>
                <th>Estado</th>
                <th>ID Cliente</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Editar</th>
                <th>Ver detalles</th>

            </thead>
    
            <?php
            $SQL ="SELECT factura.id_factura, factura.fecha_recibido, factura.fecha_entregado, factura.estado, usuarios.documento, usuarios.nombres, usuarios.apellidos FROM factura
            INNER JOIN usuarios
            ON factura.info_cliente_id = usuarios.documento WHERE factura.estado = 'CANCELADA' ORDER BY factura.id_factura ASC;";
            $result = mysqli_query($conn,$SQL);
            while($fila=mysqli_fetch_array($result)){
            ?>
            <tr>
            <?php $num_factura = $fila['id_factura']; ?>
            <?php $fec_recibido = $fila['fecha_recibido']; ?>
            <?php $fec_entrega = $fila['fecha_entregado']; ?>
            <?php $estado = $fila['estado']; ?>
            <td><?php echo $num_factura ;?></td>
            <td><?php echo $fec_recibido ; ?></td>
            <td><?php echo $fec_entrega ; ?></td>
            <td><?php echo $estado ; ?></td>
            <td><?php echo $fila['documento']; ?></td>
            <td><?php echo $fila['nombres']; ?></td>
            <td><?php echo $fila['apellidos']; ?></td>
            <td><a href="editar_factura.php?id=<?php echo $num_factura; ?>" class="boton_editar">Editar</a></td>
            <td><a href="ver_dec_fac_elimi_adm.php?factura=<?php echo $num_factura; ?>"><img src="img_fac/ver_detalles_icono.webp" class="icono_ver_adm"></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <!-- Fin lista de facturas -->
<?php include('pie_pagina.php'); ?>