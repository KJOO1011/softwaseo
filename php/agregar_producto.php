<?php
ob_start(); // Iniciar output buffering

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prsoftwaseoo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ''; // Variable para almacenar mensajes

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Manejo de la carga de la imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta_imagen = 'uploads/' . basename($imagen);
    
    // Mover la imagen a la carpeta 'uploads'
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        $message .= "La imagen se ha subido correctamente.\n";

        // Insertar datos en la base de datos
        $sql = "INSERT INTO productos (nombre, precio, imagen) VALUES ('$nombre', '$precio', '$ruta_imagen')";
        
        if ($conn->query($sql) === TRUE) {
            $message .= "Producto agregado correctamente.\n";
        } else {
            $message .= "Error: " . $conn->error . "\n";
        }
    } else {
        $message .= "Error al subir la imagen.\n";
    }
}

// Consultar los productos
$result = $conn->query("SELECT * FROM productos");

// Ahora podemos comenzar a enviar el HTML
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .page-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(126, 186, 209, 0.2);
            width: 100%;
            max-width: 400px;
            border: 3px solid #4a7a8c;
        }

        h1, h2 {
            color: rgb(126, 186, 209);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.5rem;
            color: rgb(126, 186, 209);
        }

        input[type="text"],
        input[type="file"] {
            margin-bottom: 1rem;
            padding: 0.5rem;
            border: 1px solid rgb(126, 186, 209);
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: rgb(126, 186, 209);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: rgb(96, 156, 179);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid rgb(126, 186, 209);
            padding: 0.5rem;
            text-align: left;
        }

        th {
            background-color: rgb(126, 186, 209);
            color: white;
        }

        img {
            max-width: 50px;
            height: auto;
        }

        .delete-link {
            color: rgb(126, 186, 209);
            text-decoration: none;
        }

        .delete-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .page-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <?php
    if (!empty($message)) {
        echo "<script>alert(" . json_encode($message) . ");</script>";
    }
    ?>
    <div class="page-container">
        <div class="container">
            <h2>Productos</h2>
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Imagen</th><th>Acciones</th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['precio'] . "</td>";
                    echo "<td><img src='" . $row['imagen'] . "' alt='Imagen'></td>";
                    echo "<td><a href='eliminar_producto.php?id=" . $row['id'] . "' class='delete-link' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este producto?');\">Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No hay productos registrados.";
            }
            ?>
        </div>
        
        <div class="container">
            <h1>Agregar Producto</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" required>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>

                <input type="submit" value="Agregar Producto">
            </form>
        </div>
    </div>
    
    <?php
    // Cerrar conexión
    $conn->close();
    ob_end_flush(); // Enviar el output buffer y apagarlo
    ?>
</body>
</html>

