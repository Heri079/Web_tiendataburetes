<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "Prefectura42";
$dbname = "taburetes";
$port = "3307"; 

/* Crear la conexión a la base de datos de los taburetes*/
$conn = new mysqli($servername, $username, $password, $dbname, $port);

/* Verificar la conexión*/
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];



    /*verificación para el usuario y la contraseña*/
    $stmt = $conn->prepare("SELECT id, username FROM usuarios_taburetes WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        /* Inicio de sesión si es correcto*/
        $_SESSION["username"] = $username;
        header("Location: ../index.php"); /*Para redirigirnos a la página del principio*/
        exit();
    } else {
        $error = "Nombre de usuario o contraseña incorrectos" ;
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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<h2>Iniciar Sesión</h2>


<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>

<form action="iniciar-sesion.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"required>


    <input type="submit" value="Iniciar Sesión">
    <button onclick = "window.location.href= 'registrarse.php'">¿No tiene cuenta?</button>
    
    <button onclick = "window.location.href= 'borrar_cuenta.php'">¿Desea borrar su cuenta?</button>
    
    <button onclick = "window.location.href= 'cambiar_contraseña.php'">¿Desea cambiar su contraseña?</button>
</form>

</body>
</html>