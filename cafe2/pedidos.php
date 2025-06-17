<?php
session_start();
include('conexion.php');

//Verificar si el usuario ha iniciado sesión//
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

//Si se envió un pedido//
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto'], $_POST['cantidad'])) {
    $id_producto = intval($_POST['id_producto']);
    $cantidad = intval($_POST['cantidad']);

    $sql = "INSERT INTO pedidos (id_usuario, id_producto, cantidad) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_usuario, $id_producto, $cantidad);
    $stmt->execute();
    $stmt->close();

    //Redirigir a confirmacion.php después de hacer el pedido//
    header("Location: confirmacion.php");
    exit();
}

//Obtener productos//
$sql_productos = "SELECT * FROM productos";
$resultado = $conn->query($sql_productos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Haz tu pedido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>¡HAZ TU PEDIDO!</h1>
    <p>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?> | <a href="logout.php" style="color:white;">Cerrar sesión</a></p>
</header>

<main>
    <div class="cafes">
        <?php while ($producto = $resultado->fetch_assoc()): ?>
            <div class="cafe-card">
                <?php if (!empty($producto['imagen'])): ?>
                    <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
                <?php endif; ?>
                <h3><?php echo htmlspecialchars($producto['nombre_producto']); ?></h3>
                <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>

                <form method="POST" action="pedidos.php">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <button type="submit">Agregar al pedido</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</main>

</body>
</html>
s