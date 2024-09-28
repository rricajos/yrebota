<?php
// Definir las contraseñas por defecto para cada usuario
$password1 = password_hash("patata", PASSWORD_DEFAULT);
$password2 = password_hash("sandia", PASSWORD_DEFAULT);
$password3 = password_hash("cereza", PASSWORD_DEFAULT);
$password4 = password_hash("papaya", PASSWORD_DEFAULT);

// Guardar correos y contraseñas hasheadas en el archivo correos.txt
file_put_contents('data/correos.txt', "ergoegos@gmail.com;$password1\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo2@example.com;$password2\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo3@example.com;$password3\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo4@example.com;$password4\n", FILE_APPEND);

echo "Contraseñas predeterminadas generadas y guardadas en correos.txt";
?>
