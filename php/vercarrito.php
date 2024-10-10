<?php
include 'db_connection.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Producto: " . $row["nombre"] . " - Precio: $" . $row["precio"] . " - Cantidad: " . $row["cantidad"] . "<br>";
    }
} else {
    echo "El carrito está vacío.";
}

$conn->close();
?>
