<?php

   session_start();

   if(!isset($_SESSION['usuario'])){
      echo'
         <script>
             alert("Por favor debes iniciar sesion");  
             window.location = "index.php";       
         </script>
      ';
      
      session_destroy();
      die();
      
   }

   

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../assets/css/stylewire.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
<link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

<body>
    <header>
        <nav>
            <div>
                <img src="../assets/images/NEWLOGOSFT.png" alt="" class="logo"   > 
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="bar-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="nav-menu">
                <li><a class="active" href="#">Iniciar Sesión</a></li> 
                <li><a href="error404.html">Productos</a></li>
                <li><a href="#">Contactanos</a></li>
                <li><a href="#">Registrate</a></li>
                <li><a href="#">Tu carrito</a></li>
            </ul>
        </nav>
        <div class="banner-text container">
            <h1>Manten tu hogar limpio y fresco con
                     nuestros productos de aseo 
            </h1>
            <div id="carrusel-contenido">
                <div id="carrusel-caja">
                    <div class="carrusel-elemento">
                        <img class="imagenes" src="../assets/images/Aseo-y-Cafeteria1.png" >
                    </div>
                    <div class="carrusel-elemento">   
                        <img class="imagenes" src="../assets/images/aseolimpieza.png">
                    </div>
                    <div class="carrusel-elemento">   
                        <img class="imagenes" src="../assets/images/MONTAJE-PRODUCTOS-DE-ASEO-300x300.jpg">                        
                    </div>
                </div>
            </div>

            

            <a class="btn-a" href="#">Comprar Ahora</a>

        </div>
       
    </header>
    <script src="https://kit.fontawesome.com/2cb25f2c39.js"></script>
</body>
<body>
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box" > 
                <figure>
                    <a href="#">
                        <img src="../assets/images/NEWLOGOSFT.png" alt="logo softwaseo">
                    </a>
                </figure>

            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <P>

                    Bienvenidos a Softwaseo, tu tienda en línea de confianza para productos de aseo de alta calidad.
                     <br>Nos dedicamos a ofrecerte una amplia gama de artículos esenciales para mantener tu hogar 
                    y espacio de trabajo impecables. <br> En Softwaseo, creemos en la importancia de la limpieza y el bienestar, y trabajamos arduamente para proporcionarte
                     productos efectivos y accesibles. Desde limpiadores multiusos hasta detergentes especializados,
                     cada uno de nuestros productos ha sido seleccionado con cuidado para asegurar los mejores resultados. </P>

            </div>

            <div class="box">
                <h2>CONTACTANOS</h2>
                <P>Softwaseo@gmail.com</P>
                <p>+57 3133832735</p>

            </div>

            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="error505.html" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>

           
        </div>
        <div class="grupo-2">
            <small>&copy;2024 <b>Softwaseo</b>- Todos los Derechos Reservados.</small>

        </div>
        


    </footer>
    
</body>

</html>