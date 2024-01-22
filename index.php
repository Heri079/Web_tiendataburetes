<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online - Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Taburet.es</h1>
        <ul class="navbar">
            <li><a class="btn btn-primary" href="pages/Contacto.html">Contacto</a></li>
            <li><a class="btn btn-primary" href="pages/quienes-somos.html">Quienes somos</a></li>
            <li><a class="btn btn-primary" href="pages/Atencion-al-cliente.html">Atención al cliente</a></li>
            <li><a class="btn btn-primary" href="pages/iniciar-sesion.php">Iniciar Sesión</a></li>
        </ul>
    </header>

    <main>
        <section id="productos">
            <h2>Productos</h2>
            
            <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "Prefectura42";
            $dbname = "Taburetes";
            $port = "3307";

            $conn = new mysqli($servername, $username, $password, $dbname, $port);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="producto" id="producto' . $row["id"] . '">';
                    echo '<h3>' . $row["nombre"] . '</h3>';
                    echo '<p>Precio: $' . $row["precio"] . '</p>';
                    echo '<button class="btn btn-success" onclick="agregarAlCarrito(\'' . $row["nombre"] . '\', ' . $row["precio"] . ')">Agregar al Carrito</button>';
                    echo '</div>';
                    
                    echo '<div>';
                    echo '<img src="' . $row["imagen_url"] . '" alt="' . $row["nombre"] . '">' ;
                    echo '<p>' . $row["descripcion"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay productos en la base de datos.</p>";
            }

            $conn->close();
            ?>
        </section>

        <section id= "carrito">
            <h2>Carrito</h2>
            <div id="itemsCarrito"> </div>
            <button class="btn btn-danger" onclick="vaciarCarrito()">Vaciar Carrito</button>
        </section>

        <div id="totalCarrito">Total Carrito: $0.00</div>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Contacto</h3>
                <p>correo electronico: contacto@taburete.com</p>
                <p>telefono: 684 904-24-48</p>
            </div>

            <div class="footer-section">
                <h3>Síguenos</h3>
                <p><a href="#">Facebook</a></p>
                <p><a href="#">Instagram</a></p>
                <p><a href="#">Twitter</a></p>
            </div>

            <div class="footer-section">
                <h3>Acerca de nosotros</h3>
                <p>Taburet.es es el sitio en donde encontrarás todo tipo de taburetes en el mercado.</p>
            </div>
        </div>
    </footer>

    <script src="JS/script.js"></script>
</body>
</html>
