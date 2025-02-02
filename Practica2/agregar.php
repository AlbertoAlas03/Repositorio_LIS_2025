<?php
if (isset($_POST)) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $uvs = $_POST['uvs'];
    $nota = $_POST['nota'];

    $xml = simplexml_load_file('materias.xml');
    $materia = $xml->addChild('materia');
    $materia->addChild('codigo', $codigo);
    $materia->addChild('nombre', $nombre);
    $materia->addChild('uvs', $uvs);
    $materia->addChild('nota', $nota);
    file_put_contents('materias.xml', $xml->asXML());
    header('location: index.php?exito=1');
}
