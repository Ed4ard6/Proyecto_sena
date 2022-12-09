<?php include('./menu_admin.php');?>
    <!-- Inicio de Codigo de lista facturas-->
    <div class="contenedor_lista_facturas">
    <div class="titulo_lista_facturas">
    <h1>Lista Facturas </h1>
    </div>
    <div class="buscador">
                <form action="listafacturas.php" class="formulario" method="post">
                <input type="number" name="id_cli" id="id_cli" placeholder="Buscar id cliente" class="input_buscar">
                <label for="campo"></label>  
                <!-- <input type="submit" class="btn_buscar"  value="Buscar"> --> 
                <input type="submit" name="buscar" id="buscar" value="Buscar" class="btn_buscar">
                <a href="../generar_factura.php" class="botones_facturas">(+) Añadir nueva factura</a>
                 <a href="lista_facturas_eliminadas.php" class="botones_facturas" id="boton_eliminar">Facturas eliminadas</a>
                 <!-- <a href="listafacturas.php" class="boton_lista">Listado Facturas</a> -->
                </form>
            </div>
            <?php
            //////////////////////////////////////////inicio boton buscar ////////////////////////////////////////////
            if (isset($_POST['buscar'])){

                $id_cliente = $_POST['id_cli'];
                $SQL ="SELECT factura.id_factura, factura.fecha_recibido, factura.fecha_entregado, factura.estado, usuarios.documento, usuarios.nombres, usuarios.apellidos FROM factura
                INNER JOIN usuarios
                ON factura.info_cliente_id = usuarios.documento WHERE usuarios.documento = '$id_cliente' ORDER BY factura.id_factura DESC;";
                $result = mysqli_query($conn,$SQL);

                if (mysqli_num_rows($result) <= 0){
                    ?>
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
                    <th>Eliminar</th>
                    <th>Ver detalles</th>
    
                </thead>
                </table>
                <h1 class="factura_inexistente">¡El id-usuario ingresado no tiene facturas!</h1>
                
        
                <?php

                    echo "";

                }else{

                ?>
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
                    <th>Eliminar</th>
                    <th>Ver detalles</th>
    
                </thead>
        
                <?php
                $id_cliente = $_POST['id_cli'];
                $SQL ="SELECT factura.id_factura, factura.fecha_recibido, factura.fecha_entregado, factura.estado, usuarios.documento, usuarios.nombres, usuarios.apellidos FROM factura
                INNER JOIN usuarios
                ON factura.info_cliente_id = usuarios.documento WHERE /* factura.estado = 'Verificado' AND */ usuarios.documento = '$id_cliente' ORDER BY factura.id_factura DESC ;";
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
                <td><a href="update_factura.php?id=<?php echo $num_factura; ?>" class="boton_editar">Actualizar</a></td>
                <td><a href="confirma_eli_factura.php?id_factura=<?php echo $num_factura; ?>" class="boton_eliminar">Eliminar</a></td>
                <td><a href="ver_det_fac_adm.php?factura=<?php echo $num_factura; ?>"><img src="img_fac/ver_detalles_icono.webp" class="icono_ver_adm"></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- Fin lista de facturas -->
                <?php
                }
//////////////////////////////fin boton Buscar //////////////////////////////////////////
            }else{
                ?>
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
                    <th>Eliminar</th>
                    <th>Ver detalles</th>
    
                </thead>
        
                <?php
                $SQL ="SELECT factura.id_factura, factura.fecha_recibido, factura.fecha_entregado, factura.estado, usuarios.documento, usuarios.nombres, usuarios.apellidos FROM factura
                INNER JOIN usuarios
                ON factura.info_cliente_id = usuarios.documento WHERE factura.estado = 'Verificado' ORDER BY factura.id_factura ASC ;";
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
                <td><a href="confirma_eli_factura.php?id_factura=<?php echo $num_factura; ?>" class="boton_eliminar">Eliminar</a></td>
                <td><a href="ver_det_fac_adm.php?factura=<?php echo $num_factura; ?>"><img src="img_fac/ver_detalles_icono.webp" class="icono_ver_adm"></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- Fin lista de facturas -->
        <?php
            }

     include('pie_pagina.php'); ?>