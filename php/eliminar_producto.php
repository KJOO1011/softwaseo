<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Tu usuario de MySQL
$password = ""; // Tu contraseña de MySQL
$dbname = "prsoftwaseoo"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Comprobar si se ha enviado el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validar que el ID es un número entero
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Eliminar el producto de la base de datos
        $sql = "DELETE FROM productos WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    } else {
        echo "ID inválido.";
    }
} else {
    echo "No se ha proporcionado un ID.";
}

// Redirigir a la página principal
header("Location: agregar_producto.php"); // Cambia 'index.php' por el nombre de tu archivo principal
exit(); // Termina el script para asegurar que no se ejecuta código adicional

// Cerrar conexión
$conn->close();

?>
