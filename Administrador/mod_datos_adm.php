<?php include('menu_admin.php') ?>
<!--Fin de codigo de Administrador-->
<div class="contenedor_principal_adm">
    <!-- Inicio Mi cuenta -->

    <!--Inicio  Bienvenido usuario-->
    <?php

    $_SESSION['documento'];
    $documento = $_SESSION['documento'];

    require '../conecta.php';

    $sql = "SELECT * FROM usuarios WHERE documento = '$documento'; ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row["nombres"];
            $last_name = $row["apellidos"];
            $email = $row["correo"];
            $celular = $row["num_celular"];
            $direccion = $row["direccion"];
            $usuario = $row["usuario"];
            $clave = $row["contraseña"];
            $photo = $row['imagen'];
        }
    } else {
        echo "Error en el if de asociacion linea 40 o en el comando sql linea 37";
    }
    ?>
    <!--Fin  Bienvenido usuario-->


    <div class="cuadro_datos_adm">
        <div class="titulo_tus_datos">
            <h1>Modifica tus datos!</h1><?php
            if (empty($photo)){
                ?>
                        <img class="img_bienvenido_adm" src="../img/bienvenidoadm.jpg">
                <?php
                }else {
                    ?>
                        <img class="img_bienvenido_adm" src="data:image/jpg;base64,<?php echo  base64_encode($photo); ?>">
                <?php
                }
                ?><br><br><br>
        </div>
        <form action="update_adm.php" method="post" enctype="multipart/form-data">
            <label class="cuadro_datos_modificar_label">Documento: </label>
            <input class="inputs_modificar_tus_datos" readonly type="text" id="doc" name="doc" value="<?php echo $documento; ?>"><br><br>

            <label class="cuadro_datos_modificar_label">Nombres: </label>
            <input class="inputs_modificar_tus_datos" type="text" id="nombre" name="nombre" value="<?php echo $name; ?>"><br><br>

            <label class="cuadro_datos_modificar_label">Apellidos: </label>
            <input class="inputs_modificar_tus_datos" type="text" id="apellido" name="apellido" value="<?php echo $last_name; ?>"><br><br>

            <label class="cuadro_datos_modificar_label">Correo: </label>
            <input class="inputs_modificar_tus_datos" type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

            <label class="cuadro_datos_modificar_label">Numero : </label>
            <input class="inputs_modificar_tus_datos" type="text" id="numero" name="numero" value="<?php echo $celular; ?>"><br><br>

            <label class="cuadro_datos_modificar_label">Direccion: </label>
            <input class="inputs_modificar_tus_datos" type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>"><br><br>
            
            <label class="cuadro_datos_modificar_label">Foto : </label>
            <input class="inputs_modificar_tus_datos" type="file" id="foto" size="20" name="foto" ><br><br><br><br>

            <input class="boton_finalizar_datos" type="submit" id="" name="" value="Finalizar">
        </form>

        <form action="mi_cuenta_admi.php" method="post">
            <input class="boton_concelar_datos" type="submit" id="" name="" value="Cancelar">
        </form>
    </div>

    <!-- Fin mi cuenta -->

</div>
</div>
<?php include('pie_pagina.php'); ?>