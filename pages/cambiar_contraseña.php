<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];

    /* Verificar las credenciales del usuario*/


    $stmt = $conn->prepare("SELECT id FROM usuarios_taburetes WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $currentPassword);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
    /* Cambiar tu contraseña*/
        $stmt = $conn->prepare("UPDATE usuarios_taburetes SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $newPassword, $username);

        if ($stmt->execute()) {
            $successMessage = "Contraseña cambiada exitosamente.";

            sleep(1.5);
            header("Location: ../index.php");
        } else {
            $errorMessage = "Error al cambiar la contraseña. Por favor, inténtalo de nuevo.";
        }
    } else {
        $errorMessage = "Credenciales incorrectas. Por favor, verifica tu nombre de usuario y contraseña actual.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<h2>Cambiar Contraseña</h2>

<?php
if (isset($errorMessage)) {
    echo "<p>$errorMessage</p>";
} elseif (isset($successMessage)) {
    echo "<p>$successMessage</p>";
}
?>

<form action="cambiar_contraseña.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>

    <label for="current_password">Contraseña Actual:</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">Nueva Contraseña:</label>
    <input type="password" id="new_password" name="new_password" required>

    <input type="submit" value="Cambiar Contraseña">
</form>

<button onclick = "window.location.href= '../index.php'">Volver a la página principal</button>

</body>
</html>