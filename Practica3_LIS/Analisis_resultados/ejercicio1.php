<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        input[type="number"] {
            padding: 5px;
            width: 50px;
            text-align: center;
        }
        button {
            padding: 5px 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generador de Tabla de Multiplicar</h2>
        <form method="POST">
            <label for="numero">Ingrese un número (1-30):</label>
            <input type="number" name="numero" id="numero" min="1" max="30" required>
            <br>
            <button type="submit">Generar</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = intval($_POST["numero"]);
            if ($numero >= 1 && $numero <= 30) {
                echo "<h3>Tabla de Multiplicar del $numero</h3>";
                echo "<table>";
                echo "<tr><th>Multiplicación</th><th>Resultado</th></tr>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr><td>$numero x $i</td><td>" . ($numero * $i) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red;'>Por favor, ingrese un número válido entre 1 y 30.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
