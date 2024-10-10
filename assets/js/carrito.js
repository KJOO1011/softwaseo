// Arreglo para almacenar los productos del carrito
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Seleccionar elementos del DOM
const addToCartButtons = document.querySelectorAll('.add-to-cart');
const cartItemsContainer = document.getElementById('cart-items');
const emptyCartButton = document.getElementById('empty-cart');
const buyCartButton = document.getElementById('buy-cart');

// Nuevas variables para manejar la navegación entre formularios
let currentFormStep = 0;
const formSteps = ['formulario1.php', 'formulario2.php', 'formulario3.php'];

// Función actualizada para manejar la compra
function handleBuy() {
    if (cart.length === 0) {
        alert('El carrito está vacío. Agrega productos antes de comprar.');
    } else {
        currentFormStep = 0;
        redirectToNextForm();
    }
}

// Nueva función para redirigir al siguiente formulario
function redirectToNextForm() {
    if (currentFormStep < formSteps.length) {
        window.location.href = formSteps[currentFormStep];
        currentFormStep++;
    } else {
        alert('¡Compra realizada con éxito! Total: $' + calculateTotal().toFixed(2));
        emptyCart();
        currentFormStep = 0;
    }
}

// Agregar event listener al botón de comprar
if (buyCartButton) {
    buyCartButton.addEventListener('click', handleBuy);
}

// Función para agregar productos al carrito
function addToCart(event) {
    const button = event.target;
    const productName = button.getAttribute('data-name');
    const productPrice = parseFloat(button.getAttribute('data-price'));
    const productImg = button.getAttribute('data-img');

    // Agregar el producto al carrito
    const product = { name: productName, price: productPrice, img: productImg };
    cart.push(product);

    // Actualizar visualmente el carrito y guardar en localStorage
    updateCart();
    saveCart();
}

// Función para mostrar el carrito visualmente
function updateCart() {
    if (!cartItemsContainer) return;

    // Limpiar el contenido actual del carrito
    cartItemsContainer.innerHTML = '';

    // Añadir cada producto al carrito visual
    cart.forEach((item, index) => {
        const li = document.createElement('li');

        // Crear la imagen del producto
        const img = document.createElement('img');
        img.src = item.img;
        img.alt = item.name;

         // Ajustar el tamaño de la imagen
         img.style.width = '50px'; // Ajusta el tamaño que desees
         img.style.height = 'auto'; // Mantiene la proporción de la imagen
 

        // Crear el texto del producto
        const text = document.createElement('span');
        text.textContent = `${item.name} - $${item.price.toFixed(2)}`;

        // Crear botón para eliminar producto
        const removeButton = document.createElement('button');
        removeButton.textContent = 'X';
        removeButton.className = 'remove-button'; // Agrega una clase para estilo
        removeButton.onclick = () => removeFromCart(index);



        // Añadir elementos al lista
        li.appendChild(img);
        li.appendChild(text);
        li.appendChild(removeButton);

        cartItemsContainer.appendChild(li);
    });

    // Mostrar el total
    const totalElement = document.createElement('li');
    totalElement.textContent = `Total: $${calculateTotal().toFixed(2)}`;
    cartItemsContainer.appendChild(totalElement);
}

// Función para calcular el total del carrito
function calculateTotal() {
    return cart.reduce((total, item) => total + item.price, 0);
}

// Función para eliminar un producto del carrito
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
    saveCart();
}

// Función para vaciar el carrito
function emptyCart() {
    cart = [];
    updateCart();
    saveCart();
}

// Función para guardar el carrito en localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Agregar event listeners
if (addToCartButtons) {
    addToCartButtons.forEach(button => button.addEventListener('click', addToCart));
}

if (emptyCartButton) {
    emptyCartButton.addEventListener('click', emptyCart);
}

// Nueva función para inicializar la navegación en los formularios
function initializeFormNavigation() {
    const payButtons = document.querySelectorAll('button, input[type="button"], input[type="submit"]');
    payButtons.forEach(button => {
        if (button.textContent.toLowerCase().includes('pagar')) {
            button.addEventListener('click', redirectToNextForm);
        }
    });

    const cancelButtons = document.querySelectorAll('button, input[type="button"]');
    cancelButtons.forEach(button => {
        if (button.textContent.toLowerCase().includes('cancelar')) {
            button.addEventListener('click', () => {
                window.location.href = 'index.html'; // Asumiendo que tu página principal es index.html
            });
        }
    });
}

// Llamar a esta función cuando se cargue la página
document.addEventListener('DOMContentLoaded', initializeFormNavigation);

// Inicializar el carrito
updateCart();