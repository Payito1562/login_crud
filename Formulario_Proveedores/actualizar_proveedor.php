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

// Obtener los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$rfc = $_POST['rfc'];
$curp = $_POST['curp'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$empresa = $_POST['empresa'];

// Consulta SQL para actualizar el proveedor
$sql = "UPDATE proveedores SET nombre='$nombre', apellidos='$apellidos', rfc='$rfc', curp='$curp', correo='$correo', telefono='$telefono', empresa='$empresa' WHERE codigo='$codigo'";

if ($conn->query($sql) === TRUE) {
    echo "Proveedor actualizado exitosamente";
} else {
    echo "Error al actualizar el proveedor: " . $conn->error;
}

$conn->close();
?>
