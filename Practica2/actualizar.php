<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $codigo = htmlspecialchars($_POST['codigo']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $uvs = intval($_POST['uvs']);
    $nota = floatval($_POST['nota']);

    $materias = simplexml_load_file('materias.xml');
    if ($materias === false) {
        die('Error al cargar el archivo XML.');
    }
    $materiaEncontrada = false;
    foreach ($materias->materia as $materia) {
        if (strval($materia->codigo) === $codigo) {
            $materia->nombre = $nombre;
            $materia->uvs = $uvs;
            $materia->nota = $nota;
            $materiaEncontrada = true;
            break;
        }
    }

    if (!$materiaEncontrada) {
        die('Materia no encontrada.');
    }

    if (file_put_contents('materias.xml', $materias->asXML()) === false) {
        die('Error al guardar el archivo XML.');
    }

    header('location: index.php?exito=edit');
    exit();
}
