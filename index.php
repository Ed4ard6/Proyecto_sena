<?php
header("location: Administrador/total.php");
include('menu.php'); ?>
<div class="Contenedor_principal">

<?php
include ("carrusel.html");
?>
    <!-- <div class="carrousel">
        <div class="grande">
            <img src="img/carrusel-img1.jpg" alt="Imagen 1" class="img">
            <img src="img/carrusel-img2.jpg" alt="Imagen 2" class="img">
            <img src="img/carrusel-img3.jpg" alt="Imagen 2" class="img">
        </div>

        <ul class="puntos">
            <li class="punto activo"></li>
            <li class="punto"></li>
            <li class="punto"></li>
        </ul>
    </div> -->


    <div class="Video_Mapa">

        <!--Inicio video-->

        <video class="contenedor-video" controls autoplay>
            <source src="videos/intro.mp4">
        </video>
        <!--Fin video-->
        <!--Inicio de mini-mapa-->
        <iframe class="mini_mapa" height="100%" width="46%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.56078636063208!2d-74.07002752896227!3d4.5989342536791105!2m3!1f0!2f0!3f0!3m2!
                1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f99a5c94d12f3%3A0x38edfa51ffd15636!2sLavanderia%20Megarapido!5e0!3m2!1ses!2sco!4v1665500763282!5m2!1ses!2sco">
        </iframe>
        <!--Fin de mini-mapa-->

    </div>

</div>
</div>

<?php include('pie_de_pagina.php'); ?>