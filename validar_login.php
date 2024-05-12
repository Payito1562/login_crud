<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario = "root";
$contraseña = "";
$base_de_datos = "crud_db";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

// Preparar la consulta SQL para verificar las credenciales
$sql = "SELECT * FROM registro WHERE correo='$email' AND contraseña='$contraseña'";
$resultado = $conexion->query($sql);

// Verificar si se encontraron registros
if ($resultado->num_rows > 0) {
    // Credenciales válidas, redireccionar al usuario a la página principal
    header("Location: principal.html");
    exit();
} else {
    // Credenciales inválidas, mostrar un mensaje de error
    echo "Correo electrónico o contraseña incorrectos";
}

// Cerrar la conexión
$conexion->close();
?>
