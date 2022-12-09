<?php include('menu.php'); ?>

<div class="Contenedor_principal"></div>

<div class="Contenedor_principal">
    <div class="contenedor_contactanos">
        <img align="left" class="img_contactos" src="img/contactanos.svg"></img><br><br>
        <div class="texto_contactanos">
            <p>
            <h1 class="titulo_contactanos">Contactanos</h1>
            ¡Escucharte es la mejor forma de mejorar nuestros servicios! Estamos para brindarte calidad y seguridad, creando una moderna atención para solucionar tus dudas, inquietudes y/o sugerencias.<br><br>
            </p>
            <?php
            $mensaje = "Hola! tengo una duda !";
            ?>
            <a href="https://api.whatsapp.com/send?phone=573054272142&?text=<?php echo $mensaje;  ?>" target="_blank" class="boton_enviarmensaje"><img src="img/what.webp" class="whatsapp"></a>
            <h3>Horarios de atencion</h3>
            Lunes a Viernes de 8:00am a 7:00pm - Sábados de 8:00am a 6:00pm<br>
            </p><br>


        </div>
    </div>


</div>
<?php include('pie_de_pagina.php'); ?>