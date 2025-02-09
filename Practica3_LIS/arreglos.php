<?php 
$edades=[10,14,25,96,96.7]; //creando elemento

echo $edades[0]."</br>"; //accediendo al elemento

$edades[1]=28; //modificando elemento

array_push($edades,100); //añadiendo un nuevo elemento

unset($edades[0]); //eliminando la posicion 0
print_r($edades);

echo "<h2>Recorriendo el arreglo</h2>";
foreach($edades as $edad){
    echo "<p>$edad</p>";
}
$tamaño = count($edades);
echo "<p>El tamaño del arreglo es $tamaño</p>";

//ordenando un array de forma ascendente
sort($edades); //ordenamos de forma mutable
$edades_reverse = array_reverse($edades); //invertimos el orden de forma inmutable
print_r($edades);
print_r($edades_reverse);

$datos_personales = [];
$datos_personales['nombre'] = "Oscar";
$datos_personales['apellido'] = "Alas";
$datos_personales['estatura'] = 1.78;
$datos_personales['genero'] = "Masculino";
print_r($datos_personales);

echo "<h2>imprimiendo los elementos del array asociativo</h2>";
foreach($datos_personales as $clave => $dato){
echo "<p>$clave : $dato</p>";
}

?>