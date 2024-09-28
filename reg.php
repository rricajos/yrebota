<?php
// Definir las contraseñas por defecto para cada usuario
$password1 = password_hash("password123", PASSWORD_DEFAULT);
$password2 = password_hash("sandia_humana", PASSWORD_DEFAULT);
$password3 = password_hash("daw_project", PASSWORD_DEFAULT);
$password4 = password_hash("grupo4clave", PASSWORD_DEFAULT);

// Guardar correos y contraseñas hasheadas en el archivo correos.txt
file_put_contents('data/correos.txt', "correo1@example.com;$password1\n", FILE_APPEND);
file_put_contents('data/correos.txt', "barbarap.piris@gmail.com;$password2\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo3@example.com;$password3\n", FILE_APPEND);
file_put_contents('data/correos.txt', "correo4@example.com;$password4\n", FILE_APPEND);

echo "Contraseñas predeterminadas generadas y guardadas en correos.txt";
?>
