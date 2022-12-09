<?php 
session_start();
include("../../conecta.php");


if (!isset($_SESSION['admin'])) {
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/pie_pagina.css">
    <link rel="shortcut icon" href="../../img/icono.png">
    <title>Lavandería Mega Rápido</title>
</head>
<body>
    <!-- Inicio de Codigo de Menu Cliente-->
        <nav class="menu">
            <a class="titulo" style="font-size: 30px ;" href="../mi_cuenta_admi.php">Lavanderia Mega Rapido</a>
            <ul>
                <li><a href="../mi_cuenta_admi.php">Mi Cuenta</a></li>
                <li><a href="../usuarios/usuarios.php">Usuarios</a></li>
                <li><a href="../CRUD_Fact/listafacturas.php">Factura</a></li>
                <li><a href="modificar_servicio.php"  >Servicio</a></li>
                <li><a target="_blank" href="../manual.pdf">Ayuda</a></li>
                <li><a href="../cerrar_sesion.php" >Cerrar Sesión</a></li>
            </ul>
        </nav>
        <!--Fin de codigo de menu Cliente-->
            <div class="div_form_crear">
            <form action="realizado_crear.php" method="post" enctype="multipart/form-data">
                <label for="imagen" class="label_can">Ingrese la imagen del servicio (JPG O ) : </label>
                <div class="div_file"><input type="file" name="imagen" id="imagen" size="20" class="input_file_can"></div>
                <label for="nom_servicio"  class="label_can">Ingrese el nombre del servicio: </label>
                <input type="text" name="nom_servicio" id="nom_servicio" placeholder="Nombre" required class="input_can"><br><br>
                <label for="precio" class="label_can">Ingrese el precio del servicio (sin puntos ni comas): </label>
                <input type="number" name="precio" id="precio" placeholder="Precio" required class="input_can"><br><br>
                <label for="peso" class="label_can">Ingrese la tarifa de peso (opcional): </label>
                <input type="number" name="peso" id="peso" placeholder="Peso" value="0"  class="input_can"><br><br>
                <label for="descripcion" class="label_can">Ingrese la descripcion del servicio: </label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" required class="input_can"><br><br>
                <input type="submit" value="Confirmar" class="button2 button_peque "><br><br><br>
            </form>
        </div>
         
    </div>
    </div>
    <!--Inicio de pie de pagina-->
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