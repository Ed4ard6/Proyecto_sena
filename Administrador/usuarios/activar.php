<?php
include('../../conecta.php');
$id_usuari = $_REQUEST['id'];

if (isset($_REQUEST['cancelar'])) {
?>
    <script>
        window.location = "usuarios.php";
    </script>
<?php

} else {
    $sql = "UPDATE usuarios set estado = 'Activo'  WHERE documento =$id_usuari";

    $query = mysqli_query($conn, $sql);

?>
    <script>
        window.location = "usuarios.php";
    </script>
<?php
}

?>