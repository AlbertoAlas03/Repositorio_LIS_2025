<?php
function calcularDistanciaEntrePuntos($x0, $y0, $x1 = 0, $y1 = 0)
{
    return round(sqrt(pow($x1 - $x0, 2) + pow($y1 - $y0, 2)), 2);
}

function calcularMediaVarianza(...$numeros)
{
    $n = count($numeros);
    if ($n == 0) {
        return 0;
    } else {
        $sum = array_sum($numeros);
        $promedio = $sum / $n;
        $sum_numerador = 0;
        foreach ($numeros as $num) {
            $sum_numerador += pow($num - $promedio, 2);
        }
        $varianza = $sum_numerador / $n;
    }
    return [
        "promedio" => $promedio,
        "varianza" => $varianza
    ];
}

function factorialRecursivo($n)
{
    if ($n == 1) {
        return 1;
    } else {
        return $n * factorialRecursivo($n - 1);
    }
}

$resultado = calcularMediaVarianza(10, 12, 14, 16, 18);
echo "La distancia del punto (3,5) al origen es " . calcularDistanciaEntrePuntos(3, 5);
echo "</br>La distancia del punto (3,5) al (1,1) es " . calcularDistanciaEntrePuntos(3, 5, 1, 1);
echo "</br>El promedio es " . $resultado["promedio"];
echo "</br>La varianza es " . $resultado["varianza"];
echo "</br> El factorial de 6 es: " . factorialRecursivo(6);
