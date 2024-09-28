<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit();
}

// Manejar la subida de una nueva propuesta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = htmlspecialchars($_POST['entrada']);
    
    if (!empty($entrada)) {
        $entradas = file('data/entradas.txt', FILE_IGNORE_NEW_LINES);
        $nuevoID = count($entradas) + 1;
        $nuevaEntrada = "$nuevoID;$entrada;0"; // Formato ID;Entrada;Votos
        file_put_contents('data/entradas.txt', $nuevaEntrada . PHP_EOL, FILE_APPEND);
        echo "Propuesta agregada exitosamente.";
    } else {
        echo "La propuesta no puede estar vacía.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Propuesta</title>
</head>
<body>
    <h1>Sube tu propuesta</h1>
    <form action="submit.php" method="post">
        <textarea name="entrada" placeholder="Escribe tu propuesta..." required></textarea>
        <button type="submit">Subir propuesta</button>
    </form>

    <h2>Propuestas actuales</h2>
    <ul>
        <?php
        $entradas = file('data/entradas.txt', FILE_IGNORE_NEW_LINES);
        foreach ($entradas as $linea) {
            list($id, $entrada, $votos) = explode(';', $linea);
            echo "<li>$entrada (Votos: $votos) <a href='vote.php?id=$id'>Votar</a></li>";
        }
        ?>
    </ul>
</body>
</html>
