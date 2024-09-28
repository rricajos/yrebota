<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: cpass.php');
    exit();
}

// Obtener los datos enviados desde el formulario
$correoIngresado = $_SESSION['correo'];
$passwordActual = $_POST['password_actual'];
$nuevaPassword = $_POST['nueva_password'];

// Leer el archivo de correos y contraseñas
$usuariosPermitidos = file('data/correos.txt', FILE_IGNORE_NEW_LINES);
$accesoConcedido = false;

// Variable para almacenar la nueva lista de usuarios
$nuevaListaUsuarios = [];

foreach ($usuariosPermitidos as $usuario) {
    $usuario = trim($usuario);
    list($correo, $hash) = explode(';', $usuario);

    // Verificar si el correo coincide y si la contraseña actual es correcta
    if ($correo == $correoIngresado && password_verify($passwordActual, $hash)) {
        // Si la contraseña es correcta, hasheamos la nueva contraseña
        $nuevoHash = password_hash($nuevaPassword, PASSWORD_DEFAULT);
        
        // Actualizar la contraseña en la lista de usuarios
        $nuevaListaUsuarios[] = "$correo;$nuevoHash";
        $accesoConcedido = true;
    } else {
        // Mantener los usuarios tal como están si no es el usuario autenticado
        $nuevaListaUsuarios[] = "$correo;$hash";
    }
}

if ($accesoConcedido) {
    // Sobrescribir el archivo `correos.txt` con las nuevas contraseñas
    file_put_contents('data/correos.txt', implode("\n", $nuevaListaUsuarios) . "\n");

    echo "¡Contraseña cambiada exitosamente!";
} else {
    echo "Error: Contraseña actual incorrecta.";
}
?>
