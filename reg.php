<?php
// Definir las contraseñas por defecto para cada usuario
$password1 = password_hash("esa_fresa", PASSWORD_DEFAULT);
$password2 = password_hash("sandia_humana", PASSWORD_DEFAULT);
$password3 = password_hash("coliflor_cool", PASSWORD_DEFAULT);
$password4 = password_hash("remolacha_hacha", PASSWORD_DEFAULT);

// Guardar correos y contraseñas hasheadas en el archivo correos.txt
file_put_contents('data/correos.txt', "rricajos;$password1\n", FILE_APPEND);
file_put_contents('data/correos.txt', "barbara;$password2\n", FILE_APPEND);
file_put_contents('data/correos.txt', "jabbawockeez;$password3\n", FILE_APPEND);
file_put_contents('data/correos.txt', "abraham;$password4\n", FILE_APPEND);

echo "Contraseñas predeterminadas generadas y guardadas en correos.txt";
?>
