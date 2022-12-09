<?php
session_start();
include('../../conecta.php');

if (!$_SESSION['admin']) {
    # code...
    ?>
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../../login1.php";
    </script>
    <?php
    session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/estilo_fac.css">
    <link rel="stylesheet" href="../../css/pie_pagina.css">
    <link rel="shortcut icon" href="../../img/icono.png"> <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/estilo_fac.css">
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
                <li><a href="listafacturas.php">Factura</a></li>
                <li><a href="../CRUD_Servi/modificar_servicio.php">Servicio</a></li>
                <li><a target="_blank" href="../manual.pdf">Ayuda</a></li>
                <li><a href="../cerrar_sesion.php" >Cerrar Sesión</a></li>
            </ul>
        </nav>