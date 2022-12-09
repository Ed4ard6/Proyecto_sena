<?php
session_start();
if (!isset($_SESSION['admin'])) {
  # code...
  echo ' 
    <script>
    alert("Por favor debes iniciar sesion");
    window.location = "../login1.php";
    </script>
    ';

  session_destroy();
  //header("location:../login1.php");
  //die();

}
include('../conecta.php');

$sql = "SELECT id_factura, info_cliente_id  FROM factura ORDER by id_factura DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $id_factura = $row["id_factura"];
    $id_cliente = $row['info_cliente_id'];
  }
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
  <link rel="stylesheet" href="../css/menu.css">
  <!-- <link rel="stylesheet" href="../css/estilos.css"> -->
  <link rel="stylesheet" href="../css/pie_pagina.css">
  <link rel="shortcut icon" href="../img/icono.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../Administrador/table_tr_td.css">
  <title>Detalles de factura</title>
</head>

<body>


  <nav class="menu">
    <label class="titulo">Lavanderia Mega Rapido</label>

  </nav>

  <div class="Contenedor_principal">
    <?php


    $sql = "SELECT nombres, apellidos FROM usuarios WHERE documento = $id_cliente";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        $nom_cli = $row['nombres'];
        $ape_cli = $row['apellidos'];
      }
    }
    ?>
    <div class="prinipal_det">
      <div class="caja_det_factura">
        <h2 style="text-align: center;">Agregar detalles </h2>
        <div class="detalles">
          <form action="insert_det_factura.php" method="POST">
            <label class="label_det" for="cantidad">Id de la factura</label><br>
            <input class="input_agregar_detalle_tipo_tex" type="text" id="id_factura" name="id_factura" value="<?php echo $id_factura; ?>" readonly> <br><br>

            <label class="label_det" for="servicio">servicio</label><br>
            <select class="select_servicio" name="servicio" id="servicio" required>
              <option class="input_agregar_detalle_tipo_tex">Seleccione un servicio</option>
              <?php
              $res_servicios = $conn->query("SELECT * FROM servicios ORDER BY id_servicio;");

              $num_reg = $res_servicios->num_rows;
              if ($num_reg == 0) {
                echo "No se encontro un servicio";
              }
              while ($_fila = $res_servicios->fetch_array()) {
                echo "<option class='input_agregar_detalle_tipo_tex' value='" . $_fila["nom_servicio"] . "'>" . $_fila["nom_servicio"] . "</option>";
              }
              ?>
            </select><br><br><br>

            <label class="label_det" for="cantidad">Cantidad</label><br>
            <input class="input_agregar_detalle_tipo_tex" type="text" id="cantidad" name="cantidad" required> <br><br><br>

            <input class="input_agregar_detalle" type="submit" id="agregar" name="agregar" value="Agregar">
          </form>
          <form action="confirmar_finalizar.php?numero=<?php echo $id_factura ?>" method="post">
            <input class="input_finalizar_detalle" type="submit" value="Finalizar" id="Finalizar" name="Finalizar">
          </form>
          <form action="cancelar_factura.php?id_factura=<?php echo $id_factura; ?>" method="post">
            <input class="input_cancelar_detalle" type="submit" value="Cancelar" id="Cancelar" name="Cancelar">
          </form>

        </div>
      </div>
      <div class="caja_datos_factura">
        <div class="titulo_det_factura">
          <h2>Factura #<?php echo $id_factura . " -- "; ?> Clinte: <?php echo $nom_cli . " " . $ape_cli ?> </h2>
        </div>
        <?php
        //$sql = "SELECT * FROM factura WHERE id_factura = $id_factura";
        $sql = "SELECT nom_ser, cantidad, precio, total FROM det_factura WHERE id_fact_det = $id_factura;";
        $result = mysqli_query($conn, $sql);
        ?>
        <table class="table_det_fact">
          <tr>
            <th class="th_det_fact" style="width: 150px ;">Servicio</th>
            <th class="th_det_fact" width="70px">Cantidad</th>
            <th class="th_det_fact" width="70px">Precio</th>
            <th class="th_det_fact" width="70px">Total</th>
            <th class="th_det_fact" width="70px">Eliminar</th>
          </tr>
          <?php
          $total_pagar = 0;

          if (mysqli_num_rows($result) > 0) {
            // output data of each row


            while ($row = mysqli_fetch_assoc($result)) {
              //echo $row['id_factura']. "<br>".$row['fecha_recibido']. "<br>".$row['fecha_entregado']. "<br>".$row['estado']. "<br>".$row['info_cliente_id'];
              $nombre_servicio = $row['nom_ser'];
              $cantidad = $row['cantidad'];
              $precio = $row['precio'];
              $total = $row['total'];

              $total_pagar +=  $total;

          ?>
              <tr>
                <td class="td_det_fact" style="text-align: left; padding-left: 5px ;"><?php echo $nombre_servicio; ?></td>
                <td class="td_det_fact" style="text-align: center;"><?php echo $cantidad; ?></td>
                <td class="td_det_fact"><?php echo $precio; ?></td>
                <td class="td_det_fact" style="text-align: center;"><?php echo $total; ?></td>
                <form action="eliminar_servicio_fac.php?id_ser=<?php echo $id_servicio; ?>" method="post">
                  <td class="td_det_fact" style="text-align: center;">
                    <input class="buton_quitar" type="image" src="quitar.png" width="40px" height="30p">
                  </td>
                </form><!-- EStaba trabajando por aqui -->
              </tr>
          <?php
            }
          }

          echo "

";
          echo "";

          ?>
          <tr>
            <th class="th_det_fact_total_pagar_izquierdo">Total a pagar</th>
            <th class="th_det_fact_total_pagar_centro"></th>
            <th class="th_det_fact_total_pagar_centro"></th>
            <th class="th_det_fact_total_pagar_centro"><?php echo $total_pagar; ?></th>
            <th class="th_det_fact_total_pagar_derecho"></th>
        </table>

        </tr>

      </div>
    </div>
    <div class="c_footer">
    </div>

  </div>
  <!--Inicio de pie de pagina-->
  <?php include('pie_pagina.php'); ?>