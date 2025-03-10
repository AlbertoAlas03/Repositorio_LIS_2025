<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <title>Venta de autos</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Autos disponibles</h1>
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
            $movil[0] = new auto("Peugeot", "307", "Gris", "img/peugeot.jpg");
            $movil[1] = new auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg");
            $movil[2] = new auto("BMW", "X3", "Negro", "img/bmwserie6.jpg");
            $movil[3] = new auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg");

            $movil[4] = new auto();

            for ($i = 0; $i < count($movil); $i++) {
                $movil[$i]->mostrar();
            }
            ?>
        </div>
    </div>

</body>

</html>