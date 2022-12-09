<?php
include('conecta.php');
if ($_POST) {
    $documento = $_POST['documento'];
    $correo = $_POST['email'];
    $usuario = $_POST['usuario'];

    $sql = "SELECT usuario, documento, correo FROM usuarios WHERE usuario = '$usuario' AND documento = '$documento' AND correo = '$correo'";
    $result = mysqli_query($conn, $sql); //////////////////////// hasta aqui
    if (mysqli_num_rows($result) > 0) {
?>
        <script>
            alert("Los datos son correctos ");
            window.location = "cambiar_contrasenas.php?doc=<?php echo $documento; ?>";
        </script>
<?php
    } else {
        echo ' 
            <script>
            alert("Los datos son incorrectos");
            window.location = "recuperar_contrasenas.php";
            </script>
            ';
    }
}
?>