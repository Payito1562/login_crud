<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Nombre de usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP (no hay contraseña por defecto)
$database = "crud_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Guardar proveedor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $rfc = $_POST['rfc'];
    $curp = $_POST['curp'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];

    $sql = "INSERT INTO proveedores (codigo, nombre, apellidos, rfc, curp, correo, telefono, empresa) VALUES ('$codigo', '$nombre', '$apellidos', '$rfc', '$curp', '$correo', '$telefono', '$empresa')";

    if ($conn->query($sql) === TRUE) {
        echo "Proveedor creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
