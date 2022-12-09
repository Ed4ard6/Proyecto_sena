<?php
session_start();
include("../../conecta.php");


if (!isset($_SESSION['admin'])) {
    echo "hola";
    # code...
    echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../../login1.php";
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
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/pie_pagina.css">
    <link rel="shortcut icon" href="../../img/icono.png">
    <title>Lavanderia Mega Rapido</title>
</head>
<body>

        <nav class="menu">
            <a class="titulo" style="font-size: 30px ;" href="../mi_cuenta_admi.php">Lavanderia Mega Rapido</a>
            <ul>
            <li><a href="../mi_cuenta_admi.php">Mi Cuenta</a></li>
                <li><a href="../usuarios/usuarios.php">Usuarios</a></li>
                <li><a href="../CRUD_Fact/listafacturas.php">Factura</a></li>
                <li><a href="modificar_servicio.php" >Servicio</a></li>
                <li><a target="_blank" href="../manual.pdf">Ayuda</a></li>
                <li><a href="../cerrar_sesion.php" >Cerrar Sesión</a></li>
            </ul>
        </nav>
    <div class="Contenedor_principal">
        <div class="cuerpo_servicios">
            <div class="titulo_servicios" style="margin-bottom: 5px;">
                
                </div>
                <div class="titulo_servicios">
                    <h1>Modificar Tarifas</h1>
                    <h4>(Usa los botones para modificar, crear o eliminar nombre, <br> precio, descripcion e imagen de las tarifas)</h4> 
                    <a href="crear_servi.php"><button class="button button2">CREAR</button></a>
                    <a href="modifi_servi.php"><button class="button button3">MODIFICAR</button></a>
                    <a href="elimi_servi.php"><button class="button button4">ELIMINAR</button></a>
                </div>
                <?php
                include ("../../conecta.php");

                $sql="SELECT * FROM servicios WHERE estado = 'Activo'";
                $result=mysqli_query($conn,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <div class="con">
                    <img alt="img_con" class="img_con" src="data:image/jpg;base64,<?php echo  base64_encode($mostrar['imagen']); ?>">
                    <h1 class="descripcion_servicios"> <?php echo $mostrar['nom_servicio']?> <br> <h5 class="descripcion_servicios"><?php echo $mostrar['descripcion']?></h5></h1>
                    <p class="descripcion_servicios"><?php echo $mostrar['precio']?></p>
                    </div>
                    <?php
                }
                ?>
        </div> 
        </div> 
        <!--::::Pie de Pagina::::::-->
        <footer class="pie-pagina">
            <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="#">
                            <img src="../../img/icono.png" alt="Logo de SLee Dw">
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
     
</body>
</html>