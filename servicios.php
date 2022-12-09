<?php include('menu.php'); ?>
<div class="Contenedor_principal"></div>
<div class="cuerpo_servicios">
    <div class="titulo_servicios">
        <h1>Tarifas</h1>
    </div>
    <?php
    include("conecta.php");

    $sql = "SELECT * FROM servicios where  estado = 'Activo'";
    $result = mysqli_query($conn, $sql);

    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
        <div class="con">
            <img alt="img_con" class="img_con" src="data:image/jpg;base64,<?php echo  base64_encode($mostrar['imagen']); ?>">
            <h1> <?php echo $mostrar['nom_servicio'] ?> <br>
                <h5><?php echo $mostrar['descripcion'] ?></h5>
            </h1>
            <p><?php echo $mostrar['precio'] ?></p>
        </div>
    <?php
    }
    ?>
</div>
</div>
<?php include('pie_de_pagina.php'); ?>