<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $correo = $_SESSION['correo'];
    
    // Leer archivo de votos para verificar si el usuario ya votó en esta propuesta
    $votos = file('data/votos.txt', FILE_IGNORE_NEW_LINES);
    $yaVotado = false;

    foreach ($votos as $voto) {
        list($correoVotante, $propuestaID) = explode(';', $voto);
        if ($correoVotante == $correo && $propuestaID == $id) {
            $yaVotado = true;
            break;
        }
    }

    // Si ya votó, no permitir otro voto
    if ($yaVotado) {
        echo "Ya has votado por esta propuesta.";
    } else {
        // Si no ha votado, registrar el voto
        $entradas = file('data/entradas.txt', FILE_IGNORE_NEW_LINES);

        foreach ($entradas as $key => $linea) {
            list($entradaID, $entradaTexto, $votos) = explode(';', $linea);
            if ($entradaID == $id) {
                $votosActualizados = intval($votos) + 1;
                $entradas[$key] = "$entradaID;$entradaTexto;$votosActualizados";
                file_put_contents('data/entradas.txt', implode(PHP_EOL, $entradas) . PHP_EOL);
                
                // Registrar que este usuario ha votado en la propuesta
                $nuevoVoto = "$correo;$id";
                file_put_contents('data/votos.txt', $nuevoVoto . PHP_EOL, FILE_APPEND);
                
                echo "Voto registrado exitosamente.";
                header('Location: submit.php');
                exit();
            }
        }
    }
}
?>
