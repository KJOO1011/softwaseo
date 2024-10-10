<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de envío</title>
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

        .header {
            margin-bottom: 20px;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
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
            position: relative;
        }

        .progress {
            width: 66.66%;
            height: 100%;
            background-color: rgb(126, 186, 209);
            transition: width 0.3s ease;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .left-column {
            flex: 1;
            min-width: 300px;
        }

        .right-column {
            flex: 1;
            min-width: 300px;
        }

        h2 {
            color: rgb(126, 186, 209);
            margin-bottom: 20px;
        }

        .underline {
            width: 100%;
            height: 2px;
            background-color: rgb(126, 186, 209);
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: rgb(96, 156, 179);
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid rgb(126, 186, 209);
            border-radius: 4px;
            box-sizing: border-box;
        }

        .payment-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .payment-group label {
            margin-left: 10px;
        }

        button {
            background-color: rgb(126, 186, 209);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: rgb(96, 156, 179);
        }

        #cartSummary {
            background-color: #f9f9f9;
            border: 1px solid rgb(126, 186, 209);
            border-radius: 8px;
            padding: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .product img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 4px;
        }

        .coupon {
            margin-top: 20px;
        }

        .totals {
            margin-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }

            .left-column,
            .right-column {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Barra de progreso -->
        <div class="header">
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
        </div>

        <div class="content">
            <div class="left-column">
                <form id="envioForm">
                    <div class="details">
                        <h2>Detalles de envío</h2>
                        <div class="underline"></div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" id="nombres" name="nombres" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" id="apellidos" name="apellidos" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion" required>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="form-group">
                                <label for="pais">País</label>
                                <select id="pais" name="pais" required>
                                    <option value="CO">Colombia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" id="ciudad" name="ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="codigoPostal">Código Postal</label>
                                <input type="text" id="codigoPostal" name="codigoPostal" required>
                            </div>
                            <div class="form-group">
                                <label for="celular">Número de Celular</label>
                                <input type="tel" id="celular" name="celular" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group payment-group">
                                <label>
                                    <input type="radio" name="metodoPago" value="tarjeta" required>
                                    Tarjeta de Crédito
                                </label>
                            </div>
                            <div class="form-group payment-group">
                                <label>
                                    <input type="radio" name="metodoPago" value="efectivo" required>
                                    Efectivo
                                </label>
                            </div>
                        </div>

                        <div class="underline"></div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <button type="submit" id="submit">Pagar</button>
                            </div>
                            <div class="form-group full-width">
                                <button type="button" id="cancelButton">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="right-column">
                <!-- El resumen del carrito se generará dinámicamente con JavaScript -->
                <div id="cartSummary"></div>
            </div>
        </div>
    </div>

    <script src="../assets/js/carrito.js"></script>
    <script>

     document.getElementById('submit').addEventListener('click', function() {
    // Aquí puedes validar los campos si es necesario
    const envioForm = document.getElementById('envioForm');
    if (envioForm.checkValidity()) {
        // Redirigir a formulario3.php
        window.location.href = 'formulario3.php';
    } else {
        // Si los campos no son válidos, puedes mostrar un mensaje
        alert('Por favor, completa todos los campos requeridos.');
    }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Generar resumen del carrito
        const cartSummary = document.getElementById('cartSummary');
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let subtotal = 0;

        cartSummary.innerHTML = `
            <h2>Informe</h2>
            <div class="underline"></div>
        `;

        cart.forEach(product => {
            subtotal += product.price;
            cartSummary.innerHTML += `
                <div class="product">
                    <img src="${product.img}" alt="${product.name}">
                    <span>${product.name}</span> - $${product.price.toFixed(2)}
                </div>
            `;
        });

        const total = subtotal + (subtotal * 0.16); // Añadiendo el IVA
        cartSummary.innerHTML += `
            <div class="totals">
                <div class="total-row">
                    <span>Subtotal:</span>
                    <span>$${subtotal.toFixed(2)}</span>
                </div>
                <div class="total-row">
                    <span>IVA (16%):</span>
                    <span>$${(subtotal * 0.16).toFixed(2)}</span>
                </div>
                <div class="total-row">
                    <span>Total:</span>
                    <span>$${total.toFixed(2)}</span>
                </div>
            </div>
        `;
    });
    </script>
</body>
</html>
