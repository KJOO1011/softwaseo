<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(126, 186, 209, 0.1);
            padding: 20px;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .step {
            flex: 1;
            text-align: center;
            color: rgb(126, 186, 209);
            font-weight: bold;
        }

        .divider {
            width: 30px;
            height: 2px;
            background-color: rgb(126, 186, 209);
            margin: 10px auto;
        }

        .progress-line {
            height: 4px;
            background-color: #e0e0e0;
            margin-bottom: 20px;
            position: relative;
        }

        .progress {
            width: 33.33%;
            height: 100%;
            background-color: rgb(126, 186, 209);
            transition: width 0.3s ease;
        }

        #productList {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .product-info {
            background-color: white;
            border: 1px solid rgb(126, 186, 209);
            border-radius: 8px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-info img {
            width: 100%;
            max-width: 150px;
            height: auto;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .product-details {
            text-align: center;
            margin-bottom: 10px;
        }

        .quantity-box {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-box input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            padding: 5px;
            border: 1px solid rgb(126, 186, 209);
            border-radius: 4px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            background-color: rgb(126, 186, 209);
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgb(96, 156, 179);
        }

        @media (max-width: 768px) {
            #productList {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .product-info img {
                max-width: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Barra de progreso -->
        <div class="progress-bar">
            <div class="step" data-step="1">1. Carrito de compras</div>
            <div class="divider"></div>
            <div class="step" data-step="2">2. Detalles de envío</div>
            <div class="divider"></div>
            <div class="step" data-step="3">3. Opciones de pago</div>
        </div>
        <div class="progress-line">
            <div class="progress"></div>
        </div>

        <!-- Formulario del carrito -->
        <form id="carritoForm"  action="formulario2.php" method="post">
            <!-- Los productos se generarán dinámicamente con JavaScript -->
            <div id="productList"></div>

            <div class="buttons">
                <button type="submit" id="submit">Pagar</button>
                <button type="button" id="cancelButton">Cancelar</button>
            </div>
        </form>
    </div>

    <script src="../assets/js/carrito.js"></script>
    <script>
        // Código para generar dinámicamente los productos del carrito
        document.addEventListener('DOMContentLoaded', function() {
            const productList = document.getElementById('productList');
            
            // Obtener los productos del carrito desde localStorage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            cart.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'product-info';
                productElement.innerHTML = `
                    <img src="${product.img}" alt="${product.name}">
                    <div class="product-details">
                        ${product.name} $${product.price.toFixed(2)}
                    </div>
                    <div class="quantity-box">
                        Cantidad: <input type="number" name="quantity_${product.id}" value="1" min="1">
                    </div>
                `;
                productList.appendChild(productElement);
            });

            // Evento para el botón de cancelar
            document.getElementById('cancelButton').addEventListener('click', function() {
                window.location.href = 'index.html';
            });

            document.getElementById('submit').addEventListener('click', function() {
                window.location.href = 'formulario2.php';
            });
        });
    </script>
</body>
</html>