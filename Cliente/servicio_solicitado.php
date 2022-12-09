<?php
     $destinatario = 'ed4ard60achac6n@gmail.com';
     $nombre = $_POST['Nombre'];
     $direccion = $_POST['Direccion'];
     $email = $_POST['email'];
     $telefono = $_POST['telefono'];
     $mensaje = $_POST['Mensaje'];
     
     $header = "Solicito un servicio con los siguientes datos:";
     $mensaje_completo = "Hola, yo" . $nombre . "solicito un servicio a la direccion" . $direccion . 
     ", mi numero de telefono es" . $telefono . "Informacion adicional:" . $mensaje;

     mail($destinatario, "Solicitud de Servicio de",$mensaje_completo, $header);
     echo "<script>alert('Servicio solicitado con exito')</script>";
     echo "<script> setTimeout(\"location.href='Servicios_Cliente.php'\",1000)</script>";
