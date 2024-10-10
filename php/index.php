<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://kit.fontawesome.com/57faba85b1.js" crossorigin="anonymous"></script>
    <title>Carrito de compras</title>
</head>
<body>
    <div class="container">
        <nav>
            <img src="../assets/images/NEWLOGOSFT.PNG" alt="Logo" class="logo">
            

          <div class="cart-container">
             <i class="fa-solid fa-cart-shopping" id="cart-icon"></i>
             <div class="buy-card" id="cart-content">
             <ul id="cart-items">
                <!-- Aquí aparecerán los productos -->
             </ul>
            
            <button id="empty-cart">VACIAR CARRITO</button>
            <button id="buy-cart">COMPRAR</button>
             </div>
          </div>
        </nav>
        <h1>Productos Aseo</h1>
        <div class="grid">
            <?php
            include 'db_connection.php';
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="items">';
                    echo '<img src="../php/' . htmlspecialchars($row["imagen"]) . '" alt="' . htmlspecialchars($row["nombre"]) . '">';
                    echo '<div class="info">';
                    echo '<h3>' . htmlspecialchars($row["nombre"]) . '</h3>';
                    echo '<div class="precio">';
                    echo '<p>$' . number_format($row["precio"], 0, ',', '.') . '</p>';
                    echo '</div>';
                    echo '<button class="add-to-cart" data-id="' . $row["id"] . '" data-name="' . htmlspecialchars($row["nombre"]) . '" data-price="' . $row["precio"] . '" data-img="../php/' . htmlspecialchars($row["imagen"]) . '">Agregar al Carrito</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No se encontraron productos.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>

   
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../assets/images/stickfooter.png" alt="Logo de la empresa" class="footer-logo-img">
            </div>
            <div class="footer-info">
                <h3>Sobre nuestra empresa</h3>
                <p>En Softwaseo, nos dedicamos a la venta de productos de aseo de alta calidad a través de nuestra plataforma de comercio electrónico. Con un enfoque en la conveniencia y la sostenibilidad, ofrecemos una amplia gama de productos que satisfacen las necesidades de higiene y limpieza del hogar y la oficina.

                Nuestro objetivo es proporcionar a nuestros clientes una experiencia de compra fácil y accesible, donde pueden explorar y adquirir productos de aseo con solo unos clics. Gracias a nuestro software de ecommerce, garantizamos un proceso de compra seguro, rápido y eficiente, brindando a nuestros usuarios la confianza que necesitan al realizar sus compras en línea.

                En Softwaseo, creemos en el poder de la tecnología para transformar la forma en que compramos y consumimos, y nos comprometemos a ofrecer productos que cuiden de nuestro entorno, asegurando que cada elección de compra tenga un impacto positivo.</p>
            </div>
            <div class="footer-contact">
                <h3>Contáctanos</h3>
                  <div class="contact-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="tel:+57 3125070934" aria-label="Teléfono"><i class="fas fa-phone"></i></a>
                    <a href="https://wa.me/3204536218" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:info@tuempresa.com" aria-label="Correo"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Softwaseo. Todos los derechos reservados.</p>
        </div>
    </footer>


    <script src="../assets/js/carrito.js"></script>
</body>
</html>