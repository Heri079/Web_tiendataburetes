<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Prefectura42";
$dbname = "taburetes";
$port = "3307"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el nombre de usuario y contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $confirmUsername = $_POST["confirm_username"];
    $confirmPassword = $_POST["confirm_password"];

    // Eliminar el usuario de la base de datos directamente
    $stmt = $conn->prepare("DELETE FROM usuarios_taburetes WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $confirmUsername, $confirmPassword);

    if ($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
        sleep(1.5);
        header("Location: ../index.php");

    } else {
        echo "Error al intentar eliminar el usuario. Por favor, inténtalo de nuevo.";
    }

    $stmt->close();
}
?>

<!-- Formulario para proporcionar nombre de usuario y contraseña -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Usuario</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<h2>Borrar Usuario</h2>

<!-- Formulario para proporcionar nombre de usuario y contraseña -->
<form action="borrar_cuenta.php" method="post">
    <label for="confirm_username">Nombre de Usuario:</label>
    <input type="text" id="confirm_username" name="confirm_username" required>

    <label for="confirm_password">Contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="submit" value="Borrar Mi Usuario">
</form>
<button onclick = "window.location.href= '../index.php'">Volver a la página principal</button>

</body>
</html>