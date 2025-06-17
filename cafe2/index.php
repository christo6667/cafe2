<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>BIENVENIDO A COFIFELIZ</h1>
        <nav>
            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                <p>Hola, <?php echo $_SESSION['usuario_nombre']; ?> | <a href="logout.php" style="color:white;">Cerrar sesión</a></p>
            <?php else: ?>
                <a href="registro.php">Registro</a> |
                <a href="login.php">Iniciar Sesión</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <h2>Disfruta de nuestros deliciosos cafés y más!!</h2>
        <p>Haz tu pedido y disfruta de una experiencia única.</p>
        <img src="cafe.jpg" alt="Taza de café">
    </main>

    <footer>
        Bienvenido | Todos los derechos reservados a COFIFELIZ &copy; 2025
    </footer>

</body>
</html>
