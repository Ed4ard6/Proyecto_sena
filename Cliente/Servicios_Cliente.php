<?php
session_start();
include("../conecta.php");


if (!isset($_SESSION['usuario'])) {
    echo "hola";
    # code...
    echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../login1.php";
    </script>
    ';

    session_destroy();
}

include("consulta_database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Mega Rapido</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/pie_pagina.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>

<body>

    <nav class="menu">
        <a class="titulo" style="font-size: 30px ;" href="mi_cuenta_cli.php">Lavanderia Mega Rapido</a>
        <ul>
            <li><a href="mi_cuenta_cli.php">Mi Cuenta</a></li>
            <li><a href="Servicios_Cliente.php" class="activo">Solicitar Servicio</a></li>
            <li><a href="lista_facturas_cli.php">Facturas</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <div class="Contenedor_principal">
        <div class="cuerpo_servicios">
            <div class="titulo_servicios">
                <h1>Tarifas</h1>
            </div>
            <?php
            include("../conecta.php");

            $sql = "SELECT * FROM servicios WHERE estado = 'Activo' ";
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
        <div class="cuerpo_servicios">
            <?php
            $sql = "SELECT * FROM usuarios WHERE "

            ?>
            <div class="titulo_servicios">
                <h1>Genere Su Servicio</h1>
            </div>
            <h1 class="genere_su_servicio"><b>¿Necesitas lavar tu ropa?</b></h1>
            <h3 class="genere_su_servicio">¡Dejanos tus datos o dale click al boton para que seas redirigido <br>
                a nuestro Whatsapp y atenderte! <h2 class="genere_su_servicio">¡lo mas pronto posible!</h2>
            </h3>
            <form action="servicio_solicitado.php" method="post">
                <div class="cuerpo_form_servi">
                    <label for="Nombre" style="color: whitesmoke;">Nombres: </label>
                    <input type="text" name="Nombre" id="Nombre" placeholder="Ingresa tu nombre" required><br><br>

                    <label for="Direccion" style="color: whitesmoke;">Direccion: </label>
                    <input type="text" name="Direccion" id="Direccion" placeholder="Ingresa tu direccion" required><br><br>

                    <label for="Email" style="color: whitesmoke;">Email: </label>
                    <input type="email" name="email" id="email" placeholder="Ingresa tu email" required><br><br>

                    <label for="Telefono" style="color: whitesmoke;">Telefono: </label>
                    <input type="number" name="telefono" id="telefono" placeholder="Ingresa tu numero de telefono" required><br><br><br><br>

                    <div class="cajaPQRSmensaje">
                        <label for="Mensaje" style="color: whitesmoke;">Indicaciones Adicionales:</label><br><br>
                        <textarea name="Mensaje" id="Mensaje" cols="32" rows="5" placeholder="Escribe aqui tu comentario" required style="height: 25%; width: 100%;"></textarea>
                    </div>
                    <button class="boton_login" type="submit">Enviar</button>
                </div>
            </form><br>
        </div>
    </div>
    <!--::::Pie de Pagina::::::-->
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
                <p>Estamos ubicados en la direccion tal numero tal y contamos con un horario de aatencion de lunes a sabado de 8 am a 8 pmx</p>
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
            <small>&copy; 2021 <b>Lavanderia Mega Rapido</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
    </div>
</body>

</html>