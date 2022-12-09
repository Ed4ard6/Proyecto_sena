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
$n_fact = $_REQUEST['factura'];

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
    <form action="lista_facturas_cli.php" method="post">
        <input class="buton_atras" type="image" src="boton.png" height="30px" width="555px">
    </form>

    <!--Fin de codigo de menu Cliente-->
    <div class="Contenedor_principal">

        <div class="caja_det_fac_cli">
            <!-- Inicio Mi cuenta -->

            <h1 class="titulo_lista_fact">Factura #<?php echo $n_fact; ?></h1>

            <div class="caja_facturas_cli">
                <!-- ###################### caja de facturas -->
                <?php
                include('../conecta.php');


                $sql = "SELECT det_factura.id, det_factura.cantidad, det_factura.id_servicios_det, servicios.nom_servicio, servicios.precio FROM det_factura 
       INNER JOIN servicios on det_factura.id_servicios_det = servicios.id_servicio AND det_factura.id_factura_det = $n_fact; ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table_det_fact">
                        <tr>
                            <th class="th_det_fact_cli">Servicio</th>
                            <th class="th_det_fact_cli">Cantidad</th>
                            <th class="th_det_fact_cli">Precio</th>
                            <th class="th_det_fact_cli">Total</th>
                        </tr>

                        <?php
                        $total_pagar = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_detalle = $row['id'];
                            $cantidad = $row['cantidad'];
                            $n_servicio = $row['id_servicios_det'];
                            $servicio = $row['nom_servicio'];
                            $precio = $row['precio'];
                            $total = $precio * $cantidad;
                            $total_pagar = $total + $total_pagar;
                        ?>
                            <tr>
                                <td class="td_det_fact_cli"><?php echo $servicio; ?></td>
                                <td class="td_det_fact_cli"><?php echo $cantidad; ?></td>
                                <td class="td_det_fact_cli"><?php echo $precio; ?></td>
                                <td class="td_det_fact_cli"><?php echo $total; ?></td>

                            </tr>
                    <?php
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