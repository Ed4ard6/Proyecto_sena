<?php
session_start();
if (isset($_SESSION['usuario'])){
    header("location: Cliente/mi_cuenta_cli.php");
} elseif (isset($_SESSION['admin'])){
    header("location: Administrador/mi_cuenta_admi.php");
}
include('menu.php'); 
?>
<div class="Contenedor_principal">
    <div class="titulo_contactos">
        <h1>Iniciar Sesion</h1>
    </div>
    <div class="cuerpo_login">
        <form action="login.php" method="post">
            <div class="imglogin">
                <img src="img/usuarioimagen.png"><br><br><br>
            </div>
            <label for="usuario">Usuario: </label> <!-- Para identidificar que tipo de datos va a colocar el input -->
            <input type="text" id="usuario" name="usuario" placeholder="Ingrese usuario aqui " required><br><br>
            <label for="password">Contaseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingrese contraseña" required><br><br>

            <div class="tipousuario">
                Tipo de usuario:
                <select name="tipo_de_usuario" id="tipo_de_usuario">
                    <option value="C">Cliente</option>
                    <option value="A">Administrador</option>
                </select>
                <p class="olvidar_contraseña"> <a href="recuperar_contrasenas.php">¿Olvidaste la Contraseña?</a> </p>
                <input class="boton_login" type="submit" id="enviar" name="enviar" value="Enviar">
            </div><br>
        </form>

    </div>

</div>

<?php include('pie_de_pagina.php'); ?>