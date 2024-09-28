<?php
session_start();

// Leer el archivo de correos y contraseñas
$correoIngresado = $_POST['correo'];
$passwordIngresada = $_POST['password'];
$usuariosPermitidos = file('data/correos.txt', FILE_IGNORE_NEW_LINES);

$accesoConcedido = false;

foreach ($usuariosPermitidos as $usuario) {
    list($correo, $hash) = explode(';', $usuario);
    
    // Verificar si el correo coincide y si la contraseña es correcta usando password_verify()
    if ($correo == $correoIngresado && password_verify($passwordIngresada, $hash)) {
        $accesoConcedido = true;
        break;
    }
}

if ($accesoConcedido) {
    $_SESSION['correo'] = $correoIngresado; // Guardar la sesión con el correo
    header('Location: submit.php'); // Redirigir a la página de propuestas
    exit();
} else {
    echo "Acceso denegado. Correo o contraseña incorrectos.";
}
?>
