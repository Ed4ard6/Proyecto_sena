<?php
include('menu_admin.php');
?>
<div class="caja_facturas_admi">
    <div class="prueba_factura">
        <div class="titulo_generar_factura">
            <h1>Nueva Factura</h1>
        </div>
        <form action="insert_fact.php" method="POST">

            <label class="label" for="id_cli">Digite el id del cliente</label>
            <input class="input_right" type="text" name="id_cli" id="id_cli" required><br><br><br>

            <label class="label" for="fecha_recibido">Fecha de recibido</label>
            <input class="input_right" style="width: 165px ;" type="date" name="fecha_recibido" id="fecha_recibido" min="<?php echo $mes_min_recibido; ?>" max="<?php echo $fecha; ?>" required><br><br><br>

            <label class="label" for="fecha_entrega">Fecha de entrega</label>
            <input class="input_right" style="width: 165px ;" type="date" name="fecha_entrega" id="fecha_entrega" min="<?php echo $fecha; ?>" max="<?php echo $mes_max_entrega; ?>" required><br><br>
            <br><br>
            <input class="boton_siguiente" type="submit" name="siguiente" id="siguiente" value="Siguente">
        </form>
    </div>
</div>
</div>

<?php include('pie_pagina.php'); ?>