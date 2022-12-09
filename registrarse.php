<?php include('menu.php'); ?>
<div class="Contenedor_principal"></div>
<div class="titulo_contactos">
    <h1>Registrarse</h1>
</div>
<div class="caja">
    <form action="registro.php" method="post" enctype="multipart/form-data">
        <div class="cuerpo_registrase">
            <label for="nombre">Nombres: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese nombres" size="30" maxlength="30" required><br><br>

            <label for="apellido">Apellidos: </label>
            <input type="text" name="apellido" id="apellido" placeholder="Ingrese apellidos" size="30" maxlength="30" required><br><br>


            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" placeholder="Ingrese su direccion" size="80" maxlength="80" required><br><br>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Ingresa tu email" size="80" maxlength="80" required><br><br>

            <label for="telefono">Telefono: </label>
            <input type="number" name="telefono" id="telefono" placeholder="Ingresa tu numero de telefono" size="10" maxlength="10" required><br><br>

            <label for="documento">Numero de documento: </label>
            <input type="number" name="documento" id="documento" placeholder="Numero de documento" title="minimo 5 digitos" min="0000011111" size="15" maxlength="15" required><br><br>

            <label for="imagen">Ingrese la imagen : </label>
            <div><input type="file" name="imagen" id="imagen" size="20"></div><br><br>

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" required><br><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required><br><br>

            <label for="c_clave">Confirmar contraseña:</label>
            <input type="password" name="c_clave" id="c_clave" placeholder="Confirmar contraseña" required></BR></BR>

            <input class="boton_registrase" type="submit" id="Enviar" name="enviar" value="Enviar">
        </div>
    </form>
</div>

<?php include('pie_de_pagina.php'); ?>