<?php
session_start();
if (!isset($_SESSION['usuario'])) {
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../Administrador/style.css">
    <link rel="stylesheet" href="../Administrador/table_tr_td.css">
    <link rel="stylesheet" href="../css/pie_pagina.css">
    <link rel="shortcut icon" href="../img/icono.png">
    <title>Lavandería Mega Rápido</title>
</head>

<body>

    <!-- Inicio de Codigo de Menu Cliente-->
    <nav class="menu">
        <a class="titulo" style="font-size: 30px ;" href="mi_cuenta_cli.php">Lavanderia Mega Rapido</a>
        <ul>
            <li><a href="mi_cuenta_cli.php">Mi Cuenta</a></li>
            <li><a href="Servicios_Cliente.php">Solicitar Servicio</a></li>
            <li><a href="lista_facturas_cli.php" class="activo">Facturas</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <!--Fin de codigo de menu Cliente-->
    <div class="Contenedor_principal">
        <div class="caja_det_fac_cli">
            <!-- Inicio Mi cuenta -->

            <h1 class="titulo_lista_fact">Listado de tus facturas</h1>

            <div class="caja_facturas_cli">
                <!-- ###################### caja de facturas -->
                <?php

                $_SESSION['documento'];
                $documento = $_SESSION['documento'];

                include('../conecta.php');


                $sql = "SELECT * FROM factura WHERE info_cliente_id  = $documento ORDER BY id_factura desc; ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table_det_fact">
                        <tr>
                            <th class="th_det_fact">Factura #</th>
                            <th class="th_det_fact">Fecha Recibido</th>
                            <th class="th_det_fact">Fecha Entrega</th>
                            <th class="th_det_fact">Detalles</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            //echo $row['id_factura']. " - - ". $row['fecha_recibido']." - - ".$row['fecha_entregado'];
                            $numero_fac = $row['id_factura'];
                            $recibido = $row['fecha_recibido'];
                            $entrega = $row['fecha_entregado'];
                        ?>
                            <tr>
                                <td><?php echo $numero_fac; ?></td>
                                <td><?php echo $recibido; ?></td>
                                <td><?php echo $entrega; ?></td>
                                <form action="ver_detalles_factura_cli.php?factura=<?php echo $numero_fac; ?>" method="post">
                                    <td><input style="border: solid black 2px ; border-radius:25px" type="image" src="icono_ver.png" height="35px" width="35px"></td>
                                </form>
                            </tr>
                        <?php




                        }
                    } else {
                        ?>
                        <div class="sin_fac">
                            <h1>Aun no tienes facturas</h1>
                            <a href="Servicios_Cliente.php">Solicita un servicio</a>
                        </div>
                    <?php
                    }
                    echo "</table>";
                    mysqli_close($conn);



                    ?>
            </div>
            <!-- Fin mi cuenta -->
        </div>

    </div>
    </div>
    <!--Inicio de pie de pagina-->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../img/icono.png" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>Lavanderia Mega Rapido</h2>
                <p>Estamos ubicados en la direccion tal numero tal y contamos con un horario de aatencion de lunes a sabado de 8 am a 8 pm.</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Lavanderia Mega Rapido</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
    <!--Fin de pie de pagina-->

</body>

</html>