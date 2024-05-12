<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Nombre de usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP (no hay contraseña por defecto)
$dbname = "crud_db"; // Nombre de la base de datos

// Obtener el código de producto de la URL
$codigo = $_GET['codigo'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para buscar el producto por código
$sql = "SELECT * FROM productos WHERE codigo='$codigo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si se encontró el producto, mostrar los datos
    $row = $result->fetch_assoc();
    echo "Código: " . $row["codigo"] . "<br>";
    echo "Nombre: " . $row["nombre"] . "<br>";
    echo "Presentación: " . $row["presentacion"] . "<br>";
    echo "Marca: " . $row["marca"] . "<br>";
    echo "Precio: " . $row["precio"] . "<br>";
    echo "Fecha de Caducidad: " . $row["caducidad"] . "<br>";
} else {
    // Si no se encontró el producto, mostrar un mensaje de error
    echo "No se encontró ningún producto con ese código";
}

$conn->close();
?>
