<?php
include('conecta.php');
$nueva_contraseña = $_POST['nueva_contraseña'];
$confiram_contraseña = $_POST['confiram_contraseña'];
$documento = $_REQUEST['documento'];


$sql = "SELECT  documento FROM usuarios WHERE  documento = '$documento'";
$result = mysqli_query($conn, $sql);

if (isset($_POST['enviar'])) {
    if (mysqli_num_rows($result) > 0) {
        if ($nueva_contraseña == $confiram_contraseña) {
            mysqli_query($conn, "UPDATE usuarios SET contraseña = '$nueva_contraseña' WHERE documento = '$documento';");
            echo ' 
                <script>
                alert("Contraseña actualizada correctamente");
                window.location = "login1.php";
                </script>
                ';
        } else {
            echo ' 
                <script>
                alert("Las  contrsaeñas no coinciden");
                window.location = "recuperar_contrasenas.php";
                </script>
                ';
        }
    } else {
        echo ' 
            <script>
            alert("El numero de documento no es Valido");
            window.location = "recuperar_contrasenas.php";
            </script>
            ';
    }
}
