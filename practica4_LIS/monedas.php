<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir entre monedas</title>
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.
css" integrity="sha384-
Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Equivalencias entre monedas</h1>
            </span>
        </nav>
    </header>
    <?php
    $conversion = array("aDolaresBelice", "aQuetzal", "aLempira", "aCordova", "aColon");
    $precios = range(10, 1000, 100);

    function aDolaresBelice($valor)
    {
        return sprintf("%02.2f", $valor * 2.01);
    }

    function aQuetzal($valor)
    {
        return sprintf("%02.2f", $valor * 07.72);
    }

    function aLempira($valor)
    {
        return sprintf("%02.2f", $valor * 25.60);
    }
    function aCordova($dato)
    {
        return sprintf("%02.2f", $dato * 36.75);
    }
    function aColon($dato)
    {
        return sprintf("%02.2f", $dato * 505.68);
    }
    ?>
    <section>
        <article>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Dolares (sv)</th>
                        <th>Dólares (bz)</th>
                        <th>Quetzales (gt)</th>
                        <th>Lempiras (ho)</th>
                        <th>Córdovas (ni)</th>
                        <th>Colones (cr)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < sizeof($precios); $i++) {
                        if ($i % 2 == 0) {
                            echo "\t<tr>\n";
                        } else {
                            echo "\t<tr class=\"odd\">\n";
                        }
                        echo "\t\t<td>\t\t&cent; " . $precios[$i] . "\t\t</td>\n\t\t";
                        for ($j = 0; $j < sizeof($conversion); $j++) {
                            $resultado = $conversion[$j];
                            switch ($resultado) {
                                case "aDolaresBelice":
                                    $signo = "BZ$";
                                    break;
                                case "aQuetzal":
                                    $signo = "Q";
                                    break;
                                case "aLempira":
                                    $signo = "L";
                                    break;
                                case "aCordova":
                                    $signo = "C$";
                                    break;
                                case "aColon":
                                    $signo = "&cent;";
                                    break;
                            }
                            echo "<td>\t\t$signo " .
                                number_format($resultado($precios[$i]), 3, ".", ",") . "\t\t</td>\n\t";
                        }
                        echo "\t</tr>\n";
                    }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</body>

</html> <!--Entregar ejemplos y ejercicio complementario 1-->