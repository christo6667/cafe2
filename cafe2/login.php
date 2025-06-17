<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexion.php');
    
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            
            // Redireccionar a compra.php
            header("Location: pedidos.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    
    $conn->close();
}
?>








<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>INICIAR SESIÓN</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>BIENVENIDOS</h1>
        <p>Disfruta de nuestros deliciosos cafés. Haz tu pedido y disfruta de una experiencia única.</p>
    </header>

    <div class="form-container">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

</body>
</html>