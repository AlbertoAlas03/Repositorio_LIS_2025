<?php
$estudiantes = [
    "Juan Perez" => ["tarea" => 85, "investigacion" => 90, "examen_parcial" => 78],
    "Maria Gomez" => ["tarea" => 88, "investigacion" => 92, "examen_parcial" => 85],
    "Carlos Ruiz" => ["tarea" => 75, "investigacion" => 80, "examen_parcial" => 88],
    "Ana Torres" => ["tarea" => 92, "investigacion" => 85, "examen_parcial" => 90]
];


function calcularPromedio($notas)
{
    $tarea = $notas["tarea"] * 0.50;
    $investigacion = $notas["investigacion"] * 0.30;
    $examen_parcial = $notas["examen_parcial"] * 0.20;
    return $tarea + $investigacion + $examen_parcial;
}

// Generamos la tabla HTML
echo "<html>
<head>
    <title>Promedio de Notas de Estudiantes</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>";

echo "<table>
        <tr>
            <th>Nombre del Estudiante</th>
            <th>Tarea (50%)</th>
            <th>Investigación (30%)</th>
            <th>Examen Parcial (20%)</th>
            <th>Promedio final</th>
        </tr>";

foreach ($estudiantes as $nombre => $notas) {
    $promedio = calcularPromedio($notas);
    echo "<tr>
            <td>$nombre</td>
            <td>{$notas['tarea']}</td>
            <td>{$notas['investigacion']}</td>
            <td>{$notas['examen_parcial']}</td>
            <td>" . number_format($promedio, 2) . "</td>
          </tr>";
}

echo "</table>
</body>
</html>";
