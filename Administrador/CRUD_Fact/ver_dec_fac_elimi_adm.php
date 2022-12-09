<?php include('menu_admin.php');
$n_fact = $_REQUEST['factura'];
?>
        <form  action="listafacturas.php" method="post">
        <input class="boton_atras_ver" type="image" src="../../Cliente/boton.png" >
        </form> 
        
        <!--Fin de codigo de menu Administrador-->
        <div class="Cont_principal_ver_deta_administrador">
        
        <div class="caja_det_fac_adm">
            <!-- Inicio detalles factura-->
        <p class="Logotipo_factura"><a href="#">
        <img src="../../img/icono.png" alt="Logo de SLee Dw" align="left" class="Logo_en_factura">
        </a><b>Lavanderia Megarapido</b> </p>
        <h1 class="titulo_lista_fact_adm">Factura N°<?php echo $n_fact;?></h1><br><br>
        
        <div class="caja_facturas_adm"><!-- ###################### caja de facturas -->
        <?php
       include('../../conecta.php');
       $sql = "SELECT * FROM det_factura where id_fact_det = $n_fact";
       $result = mysqli_query($conn, $sql);
       
       if (mysqli_num_rows($result) > 0) {
           ?>
           <table class="table_det_fact_adm">
               <tr class="encabezado_ver_deta_adm">
                   <th class="th_det_fact_cli">Servicio</th>
                   <th class="th_det_fact_cli">Cantidad</th>
                   <th class="th_det_fact_cli">Precio</th>
                   <th class="th_det_fact_cli">Total</th>
               </tr>
           
           <?php
           $total_pagar = 0;
           while($row = mysqli_fetch_assoc($result)) {
           $cantidad = $row['cantidad'];
           $servicio = $row['nom_ser'];
           $precio = $row['precio'];
           $total = $row['total'];
           
           ?>
           <tr class="tr1">
               <td class="td_det_fact_cli"><?php echo $servicio ; ?></td>
               <td class="td_det_fact_cli"><?php echo $cantidad ; ?></td>
               <td class="td_det_fact_cli"><?php echo $precio ; ?></td>
               <td class="td_det_fact_cli"><?php echo $total ; ?></td>
            
           </tr>
           <?php


            $total_pagar = $total + $total_pagar;
           
           }
       } else {
           echo "Aun no tienes facturas";
       }
       ?>

       <th class="th_det_fact_total_pagar_izquierdo">Total a pagar</th>
       <th class="th_det_fact_total_pagar_centro"></th>
       <th class="th_det_fact_total_pagar_centro"></th>
       <th class="th_det_fact_total_pagar_derecho"><?php echo $total_pagar; ?> </th>
       <?php
       echo "</table>";
       mysqli_close($conn);
   
       
       
   ?>
        </div>
<!-- Fin mi cuenta -->
        </div>

    </div>
    </div>

<?php include('pie_pagina.php'); ?>