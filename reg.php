<?php
// Este script solo se usa una vez para generar las contraseñas hasheadas
$password1 = password_hash("contraseña1", PASSWORD_DEFAULT);
$password2 = password_hash("contraseña2", PASSWORD_DEFAULT);
$password3 = password_hash("contraseña3", PASSWORD_DEFAULT);
$password4 = password_hash("contraseña4", PASSWORD_DEFAULT);

file_put_contents('data/correos.txt', "correo1@example.com;$password1\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo2@example.com;$password2\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo3@example.com;$password3\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo4@example.com;$password4\n", FILE_APPEND);

echo "Contraseñas generadas y guardadas en correos.txt";
