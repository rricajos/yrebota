<?php
// Leer el archivo de correos permitidos
$correoIngresado = $_POST['correo'];
$correosPermitidos = file('data/correos.txt', FILE_IGNORE_NEW_LINES);

// Verificar si el correo está en la lista de correos permitidos
if (in_array($correoIngresado, $correosPermitidos)) {
    session_start();
    $_SESSION['correo'] = $correoIngresado; // Guardar la sesión
    header('Location: submit.php'); // Redirigir a la página de propuestas
    exit();
} else {
    echo "Acceso denegado. Tu correo no está autorizado.";
}
?>
