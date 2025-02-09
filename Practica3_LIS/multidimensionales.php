<?php
$alumnos = [
    [
        'nombre' => 'Oscar',
        'apellido' => 'Alas',
        'Carnet' => 'AG221353',
        'CUM' => 8,
        'materias' => ['LIS', 'ACE', 'AEE', 'EDI', 'AMN']
    ],
    [
        'nombre' => 'Miguel',
        'apellido' => 'Flores',
        'Carnet' => 'MF221353',
        'CUM' => 6,
        'materias' => ['LIS', 'ACE', 'AEE', 'EDI', 'AMN']
    ],
    [
        'nombre' => 'Laura',
        'apellido' => 'Lopez',
        'Carnet' => 'LL221353',
        'CUM' => 8,
        'materias' => ['LIS', 'ACE', 'AEE', 'EDI', 'AMN']
    ]
];
?>

<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Carnet</th>
        <th>CUM</th>
        <th>Materias inscritas</th>
    </tr>
    <?php
    foreach ($alumnos as $alumno) {
    ?>
        <tr>
            <td><?php echo $alumno['nombre'] ?></td>
            <td><?php echo $alumno['apellido'] ?></td>
            <td><?php echo $alumno['Carnet'] ?></td>
            <td><?php echo $alumno['CUM'] ?></td>
            <td><?php echo implode('-', $alumno['materias']) ?></td>
        </tr>
    <?php } ?>
</table>