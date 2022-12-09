<?php include('menu_admin.php');
include('../conecta.php');
?>

<div class="contenedor_principal_adm">

    <div class="titulo_lista_facturas">
    <h1>Informes</h1>
    
    </div>

    <table class="table">
                <thead>
                    <th>#</th>
                    <th>Fecha recibido</th>
                    <th>Fecha entregado</th>
                    <th>ID Cliente</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Total</th>
    
                </thead>
        
                <?php
                $SQL ="SELECT factura.total, factura.id_factura, factura.fecha_recibido, factura.fecha_entregado, usuarios.documento, usuarios.nombres, usuarios.apellidos FROM factura
                INNER JOIN usuarios
                ON factura.info_cliente_id = usuarios.documento WHERE factura.estado = 'Verificado' ORDER BY factura.id_factura ASC ;";
                $result = mysqli_query($conn,$SQL);
                $ventas =0;
                while($fila=mysqli_fetch_array($result)){
                ?>
                <tr>
                <?php $num_factura = $fila['id_factura']; ?>
                <?php $fec_recibido = $fila['fecha_recibido']; ?>
                <?php $fec_entrega = $fila['fecha_entregado']; ?>
                <td><?php echo $num_factura ;?></td>
                <td><?php echo $fec_recibido ; ?></td>
                <td><?php echo $fec_entrega ; ?></td>
                <td><?php echo $fila['documento']; ?></td>
                <td><?php echo $fila['nombres']; ?></td>
                <td><?php echo $fila['apellidos']; ?></td>
                <td><?php echo $fila['total']; ?></td>
                </tr>
                <?php
                $ventas = $ventas + $fila['total'];
                }
                ?>
                <td></td>
                <td>TOTAL DE VENTAS</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $ventas; ?></td>
            </table>
            <h2> 
        ventas general (listo) <br>
        ventas por clientes <br>
        ventas por Servicio <br>
        ventas por fecha </h2>
</div>
<?php include('pie_pagina.php'); ?>