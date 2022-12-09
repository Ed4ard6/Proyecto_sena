<?php include('menu.php'); ?>

<div class="contenedor_recuperar">
    <h1>Recuperar contraseña</h1>
    <form action="recuperar_contrasena.php" method="post">
        <div class="grupo">
            <label for="documento">Numero de documento:</label>
            <input type="number" name="documento" id="documento" placeholder="Ingresar documento">
        </div>
        <div class="grupo">
            <label for="usuario">usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingresar usuario">
        </div>
        <div class="grupo">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Ingresar email">
        </div>
        <div class="boton-recuperar">
            <input type="submit" value="Enviar" name="enviar">
        </div>
    </form>
</div>
<?php include('pie_de_pagina.php'); ?>