<?php
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $materias = simplexml_load_file('materias.xml');

    $nuevaLista = new SimpleXMLElement('<materias></materias>');

    foreach ($materias->materia as $materia) {
        if (strval($materia->codigo) !== strval($codigo)) {
            $nuevoMateria = $nuevaLista->addChild('materia');
            $nuevoMateria->addChild('codigo', $materia->codigo);
            $nuevoMateria->addChild('nombre', $materia->nombre);
            $nuevoMateria->addChild('uvs', $materia->uvs);
            $nuevoMateria->addChild('nota', $materia->nota);
        }
    }

    file_put_contents('materias.xml', $nuevaLista->asXML());

    header('location: index.php');
    exit();
}
?>
