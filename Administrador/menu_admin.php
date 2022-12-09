<?php
session_start();
if (!isset($_SESSION['admin'])) {

?><script>
        alert("Por favor debes iniciar sesion");
        window.location = "../login1.php";
    </script><?php

                session_destroy();
            }


            date_default_timezone_set('America/Bogota');

            $fecha = date("Y-m-d");
            $mes =  date("m");
            $dia =  date("d");
            $dia_max =  date("d") + 5;
            $año =  date("Y");
            if ($mes < 10) {
                $mes_max = "0$mes";
            }
            if ($dia < 5) {
                $dia = $dia - 5;
                $dia = "0$dia";
            } else {
                $dia = $dia - 5;
            }
            $mes_min_recibido = "$año-$mes-$dia";
            $mes_max_entrega = "$año-$mes-$dia_max";

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
    <!-- <link rel="stylesheet" href="../css/estilos.css"> -->
    <link rel="stylesheet" href="../css/pie_pagina.css">
    <link rel="shortcut icon" href="../img/icono.png">
    <link rel="stylesheet" href="style.css">
    <title>Lavandería Mega Rápido</title>
</head>

<body>

    <!-- Inicio de Codigo de Menu Cliente-->
    <nav class="menu">
        <a class="titulo" style="font-size: 30px ;" href="mi_cuenta_admi.php">Lavanderia Mega Rapido</a>
        <ul>
            <li><a href="mi_cuenta_admi.php">Mi Cuenta</a></li>
            <li><a href="usuarios/usuarios.php">Usuarios</a></li>
            <li><a href="CRUD_Fact/listafacturas.php">Factura</a></li>
            <li><a href="CRUD_Servi/modificar_servicio.php">Servicio</a></li>
            <li><a target="_blank" href="manual.pdf">Ayuda</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>