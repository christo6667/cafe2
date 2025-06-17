<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexion.php');

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    //Consulta preparada para seguridad//
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $contrasena);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>BIENVENIDOS</h1>
        <p>Disfruta de nuestros deliciosos cafés. Haz tu pedido y disfruta de una experiencia única ORDENA YA!.</p>
    </header>

    <div class="form-container">
        <h2>Registro</h2>
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Registrarse</button>
        </form>
        
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>

</body>
</html>