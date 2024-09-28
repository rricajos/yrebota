<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: index.php'); // Redirige al login si no ha iniciado sesión
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar contraseña</title>
</head>
<body>
    <h2>Cambiar contraseña de <?php echo $_SESSION['correo'] ?></h2>

    <form action="cpass_auth.php" method="POST">
        <label for="password_actual">Contraseña actual:</label>
        <input type="password" name="password_actual" required><br><br>

        <label for="nueva_password">Nueva contraseña:</label>
        <input type="password" name="nueva_password" required><br><br>

        <button type="submit">Cambiar contraseña</button>
    </form>

</body>
</html>
