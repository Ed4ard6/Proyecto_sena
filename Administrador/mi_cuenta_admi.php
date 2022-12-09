<?php include('menu_admin.php') ?>
<!--Fin de codigo de Administrador-->
<div class="contenedor_principal_adm">
    <!-- Inicio Mi cuenta -->
    <?php

    $_SESSION['documento'];
    $documento = $_SESSION['documento'];

    require '../conecta.php';

    $sql = "SELECT * FROM usuarios WHERE documento = $documento; ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["nombres"];
            $last_name = $row["apellidos"];
            $email = $row["correo"];
            $celular = $row["num_celular"];
            $direccion = $row["direccion"];
            $photo = $row['imagen'];
        }
    }

    mysqli_close($conn);

    ?>
    <!-- Fin mi cuenta -->
    <div class="cuadro_datos_adm">
        <div class="bienvenido_adm">
            <h1>¡Hola admi! <br><br><?php echo $name . " " . $last_name; ?></h1> <br>
            <?php
            if (empty($photo)){
                ?>
                        <img class="img_bienvenido_adm" src="../img/bienvenidoadm.jpg">
                <?php
                }else {
                    ?>
                        <img class="img_bienvenido_adm" src="data:image/jpg;base64,<?php echo  base64_encode($photo); ?>">
                <?php
                }
                ?>
        </div>
        <label class="cuadro_datos_label"><b> Documento : </b></label><label class="cuadro_datos_label_label"><?php echo $documento; ?></label><br><br>

        <label class="cuadro_datos_label"><b>Nombres :</b></label><label class="cuadro_datos_label_label"><?php echo $name; ?></label><br><br>

        <label class="cuadro_datos_label"><b>Apelidos : </b></label><label class="cuadro_datos_label_label"><?php echo $last_name; ?></label><br><br>

        <label class="cuadro_datos_label"><b> Correo :</b> </label><label class="cuadro_datos_label_label"><?php echo $email; ?></label><br><br>

        <label class="cuadro_datos_label"><b> Numero :</b> </label><label class="cuadro_datos_label_label"><?php echo $celular; ?></label><br><br>

        <label class="cuadro_datos_label"><b> Direccion :</b> </label><label class="cuadro_datos_label_label"><?php echo $direccion; ?></label><br><br><br>

        <form action="mod_datos_adm.php" method="post">
            <input class="boton_modificar_datos_adm" type="submit" value="Modificar datos">
    </div>
</div>
</div>
</div>
</div>
<?php include('pie_pagina.php'); ?>