<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <title>Venta de autos</title>
</head>

<body>
    <div class="container">
        <header>
            <?php
            if (isset($_POST['marca'])) {
                echo '<h1>Autos disponibles</h1>';
            } else {
                echo '<h1>Debe seleccionar una marca de auto para ver los disponibles</h1>';
            }
            ?>
        </header>
        <div class="row">
            <?php
            spl_autoload_register(function ($class) {
                if (is_file("{$class}.class.php")) {
                    include_once("{$class}.class.php");
                } else {
                    die("{$class}.class.php No existe el archivo");
                }
            });
            $marcas = array("Peugeot", "Renault", "BMW", "Toyota", "Honda");
            $movil[0] = new auto("Peugeot", "307", "Gris", "../img/peugeot.jpg");
            $movil[1] = new auto("Renault", "Clio", "Rojo", "../img/renaultclio.jpg");
            $movil[2] = new auto("BMW", "X3", "Negro", "../img/bmwserie6.jpg");
            $movil[3] = new auto("Toyota", "Avalon", "Blanco", "../img/toyota.jpg");

            $movil[4] = new auto();

            if (isset($_POST['marca'])) {
                $marcaSeleccionada = $_POST['marca'];
                foreach ($movil as $auto) {
                    if ($auto->marca == $marcaSeleccionada) {
                        $auto->mostrar();
                    }
                }
             echo "<a href='autospoo.php'><- Consultar otra marca</a>";
            } else {
                echo "<form action='' method='post'>";
                echo "<span>Seleccione la marca de auto que desea consultar: </span>";
                echo "<select class='form-select form-select-lg mb-3' style='margin-top: 10px;' name='marca'>";
                foreach ($marcas as $marca) {
                    echo "<option value='$marca'>$marca</option>";
                }
                echo "</select>";
                echo "<button type='submit' class='btn btn-success' style='margin-left: 5px;'><i class='bi bi-eye'></i> Ver detalles</button>";
                echo "</form>";
            }
            ?>
        </div>
    </div>

</body>

</html>