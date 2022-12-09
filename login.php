<?php
session_start();
if ($_POST) {
  # code...
  require 'conecta.php';
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['password'];
  $tipo_usuario = $_POST['tipo_de_usuario'];

  $sql = "SELECT usuario, contraseña, documento, tipo_usuario FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña' 
AND tipo_usuario = '$tipo_usuario' AND estado = 'Activo'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

      if ($usuario == $row["usuario"] and $contraseña == $row["contraseña"] and $tipo_usuario == "C") {
        # code...

        $_SESSION['usuario'] = $usuario;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['documento'] = $row['documento'];

        echo ' 
            <script>
            window.location = "Cliente/mi_cuenta_cli.php";
            </script>
            ';
      } elseif ($usuario == $row["usuario"] and $contraseña == $row["contraseña"] and $tipo_usuario == "A") {
        # code...

        $_SESSION['admin'] = $usuario;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['documento'] = $row['documento'];

        echo ' 
            <script>
            window.location = "Administrador/mi_cuenta_admi.php";
            </script>
            ';
      }
    }
  } else {
    echo ' 
    <script>
    alert("Verifique que los datos esten corecctos");
    window.location = "login1.php";
    </script>
    ';
  }
  mysqli_close($conn);
}
