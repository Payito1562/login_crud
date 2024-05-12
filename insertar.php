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
$nombre = $_POST['Nombre'];
$correo = $_POST['Correo'];
$contraseña = $_POST['Contraseña'];

// Preparar la consulta SQL
$sql = "INSERT INTO registro (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
