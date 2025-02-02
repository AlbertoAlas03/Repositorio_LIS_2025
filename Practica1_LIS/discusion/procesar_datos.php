<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información recibida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="container my-5">
        <article>
            <h1 class="text-center fw-bold">Información de formulario</h1>
            <div id="info" class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])):
                            echo "\t<tr>\n";
                            echo "\t\t<td>Nombre completo</td>\n";
                            // Accediendo a los datos del formulario usando la función extract()
                            extract($_POST);
                            $nombre = !empty($name) ? $name : "<a href= 'formulario_datos.html' class='text-danger'>No ingreso su nombre completo</a>";
                            echo "\t\t<td>" . $nombre . "</td>\n";
                            echo "\t</tr>\n";
                            echo "\t<tr>\n";
                            echo "\t\t<td>Lugar de nacimiento</td>\n";
                            $pais = !empty($select_country) ? $select_country : "<a href='formulario_datos.html' class='text-danger'>No ingresó el pais de recidencia</a>";
                            $departamento = !empty($select_department) ? $select_department : "<a href='formulario_datos.html' class='text-danger'>No ingresó el departamento de recidencia</a>";
                            echo "\t\t<td>" . $pais . " - " . $departamento . "</td>\n";
                            echo "\t</tr>\n";
                            echo "\t<tr>\n";
                            echo "\t\t<td>Edad</td>\n";
                            $edad = !empty($year) ? $year : "<a href='formulario_datos.html' class='text-danger'>No ingresó su edad</a>";
                            echo "\t\t<td>" . $edad . "</td>\n";
                            echo "\t</tr>\n";
                            echo "\t<tr>\n";
                            echo "\t\t<td>Carnet</td>\n";
                            $Carnet = !empty($carnet) ? $carnet : "<a href='formulario_datos.html' class='text-danger'>No ingreso su carnet</a>";
                            echo "\t\t<td>" . $Carnet . "</td>\n";
                            echo "\t</tr>\n";
                            echo "\t<tr>\n";
                        else:
                            echo "\t<tr>\n";
                            echo "\t\t<td colspan='2' class='text-danger'>No se han ingresado datos desde el formulario.</td>\n";
                            echo "\t</tr>\n";
                        endif;
                        ?>
                    </tbody>
                </table>
                <div id="link" class="text-center mt-4">
                    <a href="formulario_datos.html" class="btn btn-primary">Ingresar nuevos datos</a>
                </div>
            </div>
        </article>
    </section>

</body>

</html>