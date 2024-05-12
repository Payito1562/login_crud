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

// Consulta SQL para buscar el proveedor por RFC
$sql = "SELECT * FROM proveedores WHERE rfc='$rfc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos del proveedor encontrado
    echo "<h2>Proveedor encontrado</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Código: " . $row["codigo"]. "<br>";
        echo "Nombre: " . $row["nombre"]. "<br>";
        echo "Apellidos: " . $row["apellidos"]. "<br>";
        echo "RFC: " . $row["rfc"]. "<br>";
        echo "CURP: " . $row["curp"]. "<br>";
        echo "Correo: " . $row["correo"]. "<br>";
        echo "Teléfono: " . $row["telefono"]. "<br>";
        echo "Empresa: " . $row["empresa"]. "<br>";
    }
} else {
    echo "No se encontró ningún proveedor con el RFC proporcionado";
}

$conn->close();
?>
