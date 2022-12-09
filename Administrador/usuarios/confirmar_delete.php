<?php
include('../../conecta.php');
$documento = $_REQUEST['id'];

$query = mysqli_query($conn, "SELECT * from usuarios where documento = $documento");
$result = mysqli_num_rows($query);
if ($result > 0) {
    while ($data = mysqli_fetch_array($query)) {
        $nombre = $data['nombres'];
        $apellido = $data['apellidos'];
        $usuario = $data['usuario'];
        $contraseña = $data['contraseña'];
        $correo = $data['correo'];
        $num_celular = $data['num_celular'];
        $direccion = $data['direccion'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="confi_elimi_usu">
        <form action="delete_usu.php?id=<?php echo $documento; ?>" method="post">
            <div>
                <h2>Desea eliminar este usuario</h2>
                <p>Nombre: <span><?php echo $nombre; ?></span></p>
                <p>apellido: <span><?php echo $apellido; ?></span></p>
                <p>usuario: <span><?php echo $usuario; ?></span></p>
                <p>contraseña: <span><?php echo $contraseña; ?></span></p>
                <p>correo: <span><?php echo $correo; ?></span></p>
                <p>numero de celular: <span><?php echo $num_celular; ?></span></p>
                <p>direccion: <span><?php echo $direccion; ?></span></p>
            </div>
            <div class="btn__group">
                <div class="botones_confir_delete">
                    <input class="cancel" type="submit" value="cancelar" name="cancelar" id="cancelar">

                    <input class="confir" type="submit" value="confirmar" name="confirmar" id="confirmar">

                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php
