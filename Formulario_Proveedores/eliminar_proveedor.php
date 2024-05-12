<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Nombre de usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP (no hay contraseña por defecto)
$database = "crud_db";
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el RFC del formulario
$rfc = $_POST['rfc'];

// Consulta SQL para eliminar el proveedor por RFC
$sql = "DELETE FROM proveedores WHERE rfc='$rfc'";

if ($conn->query($sql) === TRUE) {
    echo "Eliminación exitosa";
} else {
    echo "Error al eliminar el proveedor: " . $conn->error;
}

$conn->close();
?>
