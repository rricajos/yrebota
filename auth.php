<?php
session_start();

// Obtener el correo y la contraseña ingresados por el usuario
$correoIngresado = $_POST['correo'];
$passwordIngresada = $_POST['password'];

// Leer el archivo de correos y contraseñas
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
    $_SESSION['correo'] = $correoIngresado; // Guardar la sesión
    header('Location: submit.php'); // Redirigir a la página de propuestas
    exit();
} else {
    echo "Acceso denegado. Correo o contraseña incorrectos.";
}
?>
