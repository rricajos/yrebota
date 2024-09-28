<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $entradas = file('data/entradas.txt', FILE_IGNORE_NEW_LINES);
    
    foreach ($entradas as $key => $linea) {
        list($entradaID, $entradaTexto, $votos) = explode(';', $linea);
        if ($entradaID == $id) {
            $votosActualizados = intval($votos) + 1;
            $entradas[$key] = "$entradaID;$entradaTexto;$votosActualizados";
            file_put_contents('data/entradas.txt', implode(PHP_EOL, $entradas) . PHP_EOL);
            echo "Voto registrado.";
            header('Location: submit.php');
            exit();
        }
    }
}
?>
