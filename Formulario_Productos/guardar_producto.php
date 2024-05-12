<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Nombre de usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP (no hay contraseña por defecto)
$dbname = "crud_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $presentacion = $_POST['presentacion'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $caducidad = $_POST['caducidad'];

    // Consulta SQL para insertar datos
    $sql = "INSERT INTO productos (codigo, nombre, presentacion, marca, precio, caducidad) VALUES ('$codigo', '$nombre', '$presentacion', '$marca', '$precio', '$caducidad')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto guardado exitosamente";
    } else {
        echo "Error al guardar el producto: " . $conn->error;
    }
}

$conn->close();
?>

