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
            <h1 class="text-center fw-bold">Información de la conversión</h1>
            <div id="info" class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Dolares (USD)</th>
                            <th scope="col">EUROS (EUR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])):

                            echo "\t<tr>\n";
                            extract($_POST);
                            $dolares = !empty($dolar) ? $dolar : "<a href= 'dolares_euros.html' class='text-danger'>No ingreso la cantidad</a>";
                            echo "\t\t<td>" . "$" . $dolares . "</td>\n";
                            $euros = $dolares * 0.96;
                            echo "\t\t<td>" . "€" . $euros . "</td>\n";
                            echo "\t</tr>\n";
                        else:
                            echo "\t<tr>\n";
                            echo "\t\t<td colspan='2' class='text-danger'>No se han ingresado datos desde el formulario.</td>\n";
                            echo "\t</tr>\n";
                        endif;
                        ?>
                    </tbody>
                </table>
                <div id="link" class="text-center mt-4">
                    <a href="dolares_euros.html" class="btn btn-primary">Ingresar nuevos datos</a>
                </div>
            </div>
        </article>
    </section>

</body>

</html>