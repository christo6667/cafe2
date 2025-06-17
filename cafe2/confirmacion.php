<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$producto = isset($_GET['producto']) ? htmlspecialchars($_GET['producto']) : 'el producto';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CONFIRMACIÓN</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .imagen-confirmacion {
            display: block;
            margin: 40px auto;
            max-width: 500px; /* Aumenta el tamaño máximo */
            width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.25);
        }

        main {
            text-align: center;
            padding: 20px;
        }

        header h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Confirmación de Pedido</h1>
</header>

<main>
    <p>✅ Has agregado <strong><?php echo $producto; ?></strong> a tu carrito.</p>

    <div style="margin-top: 20px;">
        <a href="pedidos.php" style="margin-right: 15px;">🛒 Seguir comprando</a>
        <a href="index.php">🏠 Volver a página principal</a>
    </div>

    <img src="cafecito.jpg" alt="Cafecito feliz" class="imagen-confirmacion">
</main>

</body>
</html>
