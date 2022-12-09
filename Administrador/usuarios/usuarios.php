<?php
include("menu_admin.php");
?>


<!--inicio de formulario-->
<div class="contenedor_lista_facturas">
    <div class="titulo_lista_facturas">
        <h1>Usuarios</h1>
    </div>
    <div class="buscador">
        <form action="buscar.php" class="formulario" method="post">
            <input type="text" name="id" id="id" placeholder="buscar identificacion" class="input_buscar">
            <label for="campo"></label>
            <input type="submit" class="btn_buscar" name="buscar" value="Buscar">
            <a href="insert.php" class="botones_facturas " id="btn__nuevo">(+) Añadir nuevo usuario</a>
            <a href="usuarios.php" class="botones_facturas" id="boton_eliminar">Usuarios activos</a>
            <a href="usuarios_inactivos.php" class="boton_lista" id="boton_eliminar">Usuarios inactivos</a>
        </form>
    </div>
    <table class="table">
        <thead>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <!-- <th>Contraseña</th> -->
            <th>Correo</th>
            <th>Numero de celular</th>
            <th>Direccion</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
            <th>Estado</th>
        </thead>
        <?php
        $sql = "SELECT * from usuarios WHERE  estado = 'Activo' ORDER BY nombres asc";
        $result = mysqli_query($conn, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
            $id_usuario = $mostrar['documento'];
        ?>

            <tr>
                <td id="td"><?php echo $mostrar['documento'] ?></td>
                <td id="td"><?php echo $mostrar['nombres'] ?></td>
                <td id="td"><?php echo $mostrar['apellidos'] ?></td>
                <td id="td"><?php echo $mostrar['usuario'] ?></td>
                <!-- <td id="td"><?php echo $mostrar['contraseña'] ?></td> -->
                <td id="td"><?php echo $mostrar['correo'] ?></td>
                <td id="td"><?php echo $mostrar['num_celular'] ?></td>
                <td id="td"><?php echo $mostrar['direccion'] ?></td>
                <td><a class="boton_editar" href="update.php?id=<?php echo $id_usuario;  ?>">actualizar</a></td>
                <td><a class="boton_eliminar" href="confirmar_delete.php?id=<?php echo $id_usuario;  ?>">Eliminar</a></td>
                <td id="td"><?php echo $mostrar['estado'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
</div>
</div>
</div>
<?php
include('pie_pagina.php');
?>