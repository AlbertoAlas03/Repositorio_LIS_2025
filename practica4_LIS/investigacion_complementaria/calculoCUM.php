<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['notas'])) {
    $notas = array_map('floatval', $_POST['notas']);
    if (count($notas) == 6) {
        $cum = array_sum($notas) / count($notas);
        
        $mensaje = "";
        if ($cum > 8.5) {
            $mensaje = "El estudiante puede optar por no hacer su proceso final de grado por haber obtenido un CUM honorífico.";
        } elseif ($cum >= 6.0 && $cum <= 8.49) {
            $materias_a_reinscribir = 0;
            
            if ($cum >= 6.00 && $cum <= 6.75) {
                $materias_a_reinscribir = 4;
            } elseif ($cum >= 6.76 && $cum <= 7.70) {
                $materias_a_reinscribir = 3;
            } elseif ($cum >= 7.71 && $cum <= 8.49) {
                $materias_a_reinscribir = 2;
            }
            
            if ($materias_a_reinscribir > 0) {
                sort($notas); 
                $menores_notas = array_slice($notas, 0, $materias_a_reinscribir);
                $mensaje = "El estudiante debe inscribir su proceso final de grado y reinscribir $materias_a_reinscribir materias donde sus notas son de: " . implode(", ", $menores_notas);
            } else {
                $mensaje = "El estudiante debe inscribir su proceso final de grado.";
            }
        } else {
            $mensaje = "El estudiante no cumple con el CUM mínimo para graduarse.";
        }
    } else {
        $mensaje = "Debe ingresar exactamente 6 notas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de CUM</title>.
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Ingrese las notas de las últimas 6 materias del estudiante</h2>
        <form method="post">
            <?php for ($i = 1; $i <= 6; $i++): ?>
                <label for="nota<?= $i ?>">Materia <?= $i ?>:</label>
                <input type="number" name="notas[]" id="nota<?= $i ?>" step="0.01" min="0" max="10" required><br>
            <?php endfor; ?>
            <button type="submit" style="margin-top: 10px;">Calcular CUM</button>
        </form>
        
        <?php if (!empty($mensaje)): ?>
            <div class="resultado">
                <h3>Resultado:</h3>
                <p><?= htmlspecialchars($mensaje) ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
