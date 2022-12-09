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
                <li><a href="modificar_servicio.php" >Servicio</a></li>
                <li><a target="_blank" href="../manual.pdf">Ayuda</a></li>
                <li><a href="../cerrar_sesion.php" >Cerrar Sesión</a></li>
            </ul>
        </nav>
        <!--Fin de codigo de menu Cliente-->
            
                    <?php 
                    $id = $_GET["id"];
                    $sql="SELECT * from servicios WHERE id_servicio='$id'";
                    $result=mysqli_query($conn,$sql);

                    while($fila=mysqli_fetch_array($result)){
                    ?>

                    <div class="div_form_crear">
            <form action="realizado_modifi.php" method="post" enctype="multipart/form-data">
                <label for="id" class="label_can">Id del servicio a modificar:</label>
                <input class="input_can" type="text" name="id" id="id" value="<?php echo $fila['id_servicio']; ?>" readonly>
                <label for="imagen" class="label_can">Ingrese la nueva imagen del servicio: </label>
                <div class="div_file"><input type="file" name="imagen" id="imagen" size="20" class="input_file_can"></div>
                <label for="nombre_ser"  class="label_can">Ingrese el nuevo nombre del servicio: </label>
                <input class="input_can" type="text" name="nombre_ser" id="nombre_ser" required value="<?php echo $fila['nom_servicio']; ?>"><br><br>
                <label for="precio_ser" class="label_can">Ingrese el nuevo precio del servicio (sin puntos ni comas): </label>
                <input class="input_can" type="text" name="precio_ser" id="precio_ser" required value="<?php echo $fila['precio']; ?>"><br><br>
                <label for="peso_ser" class="label_can">Ingrese la nueva tarifa de peso (opcional): </label>
                <input class="input_can" type="text" name="peso_ser" id="peso_ser" value="<?php echo $fila['peso']; ?>"><br><br>
                <label for="des_ser" class="label_can">Ingrese la nueva descripcion del servicio: </label>
                <input class="input_can" name="des_ser" id="des_ser" required value="<?php echo $fila['descripcion']; ?>"><br><br>
                <input type="submit" value="Confirmar" class="button3 button_peque "><br><br><br>
            </form>
                    </div>
	                <?php 
	                }
	                ?>

                    <!-- <div>
                <table id="tab_servi">
                    <tr>
            <th scope="col">Imagen del servicio</th>
            <th scope="col">ID del servicio</th>
            <th scope="col">Nombre del servicio</th>
            <th scope="col">Precio del servicio</th>
            <th scope="col">Peso (opcional)</th>
            <th  scope="col">Descripcion</th>
                    </tr>

                <form action="realizado_modifi.php" method="post" enctype="multipart/form-data">
                    <td><input class="input_can" type="file" name="imagen" id="imagen"></td>
                    <td><input class="input_can" type="text" name="id" id="id" value="<?php echo $fila['id_servicio']; ?>" readonly></td>
                    <td><input class="input_can" type="text" name="nombre_ser" id="nombre_ser" required value="<?php echo $fila['nom_servicio']; ?>"></td>
                    <td><input class="input_can" type="text" name="precio_ser" id="precio_ser" required value="<?php echo $fila['precio']; ?>"></td>
                    <td><input class="input_can" type="text" name="peso_ser" id="peso_ser" value="<?php echo $fila['peso']; ?>"></td>
                    <td><input class="input_can" name="des_ser" id="des_ser" required value="<?php echo $fila['descripcion']; ?>"></td>
                    </table>
                    <input type="submit" value="Confirmar" class="button_peque button3" style="padding: 10px 10px;">
		            </form>
            </div> -->
            
        
         <!--Inicio de Borbujas de fondo-->
         <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
         </div>
         <!--Fin de Borbujas de fondo-->
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