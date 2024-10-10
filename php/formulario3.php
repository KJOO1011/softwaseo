<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de pago</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="progress-section">
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

        <div class="content-section">
            <div class="payment-form">
                <form id="pagoForm">
                    <h2 class="payment-method">Método de pago</h2>
                    <div class="payment-line"></div>

                    <div class="payment-option">
                        <label>
                            <input type="radio" name="paymentMethod" value="creditCard" checked>
                            Tarjeta de crédito
                        </label>
                        <span class="small">[Visa, MasterCard, American Express, Discover, Diners Club, JCB, UnionPay y más]</span>
                    </div>

                    <div class="card-details">
                        <div class="card-number">
                            <label for="cardNumber">Número de tarjeta</label>
                            <input type="text" id="cardNumber" name="cardNumber" required>
                        </div>
                        <div class="card-info">
                            <div>
                                <label for="expiryDate">Fecha de expiración</label>
                                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                            </div>
                            <div>
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-holder">
                        <label for="cardHolder">Nombre del titular</label>
                        <input type="text" id="cardHolder" name="cardHolder" required>
                    </div>

                    <div class="action-buttons">
                        <button type="submit">Pagar</button>
                        <button type="button" id="cancelButton">Cancelar</button>
                    </div>
                </form>
            </div>

            <div class="cart-summary">
                <!-- El resumen del carrito se generará dinámicamente con JavaScript -->
                <div id="cartSummary"></div>
            </div>
        </div>
    </div>

    <script src="../assets/js/carrito.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Generar resumen del carrito
            const cartSummary = document.getElementById('cartSummary');
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let subtotal = 0;

            cartSummary.innerHTML = `<h2>Informe</h2>`;

            cart.forEach(product => {
                subtotal += product.price;
                cartSummary.innerHTML += `
                    <div class="cart-item">
                        <img src="${product.img}" alt="${product.name}">
                        ${product.name} $${product.price.toFixed(2)}
                    </div>
                `;
            });

            const impuesto = subtotal * 0.16; // Asumiendo un impuesto del 16%
            const total = subtotal + impuesto;

            cartSummary.innerHTML += `
                <div class="cart-summary">
                    <h3>Subtotal: $${subtotal.toFixed(2)}</h3>
                    <h3>Impuesto (16%): $${impuesto.toFixed(2)}</h3>
                    <h3>Total: $${total.toFixed(2)}</h3>
                </div>
            `;
        });
    </script>
</body>
</html>
