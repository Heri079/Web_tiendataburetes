<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "Prefectura42";
$dbname = "taburetes";
$port = "3307"; 

/* Creamos una conexión de nuevo*/
$conn = new mysqli($servername, $username, $password, $dbname, $port);

/* Verificación de la conexión */
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    /* Verificamos si el usuario ya esta en la base de datos*/
    $stmt = $conn->prepare("SELECT id FROM usuarios_taburetes WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "El nombre de usuario ya está registrado. Por favor, elige otro.";
    } else {
        /* Poner el nuevo usuario para registrarte*/
        $stmt = $conn->prepare("INSERT INTO usuarios_taburetes (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $_SESSION["username"] = $username;
            header("Location: ../index.php"); /* Redirección al index cuando ya se complete */
            exit();
        } else {
            $error = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
        }
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
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<h2>Registrarse</h2>

<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>

<form action="registrarse.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Registrarse">
</form>

<button onclick = "window.location.href= 'iniciar-sesion.php'">¿Ya tiene una tiene cuenta?</button>

</body>
</html>