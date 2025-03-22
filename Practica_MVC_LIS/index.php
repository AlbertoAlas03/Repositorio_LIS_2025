<?php
//include_once "models/EditorialesModel.php";
include_once "models/AutoresModel.php";

//$model_editorial = new EditorialesModel();
$model_autor = new AutoresModel();

$editorial = [
    'codigo_editorial'=>'EDI903',
    'nombre_editorial'=>'prueba2',
    'contacto'=>'prueba_editado',
    'telefono'=>'prueba'
];

$autor=[
    'codigo_autor'=>'AUT013',
    'nombre_autor'=>'prueba_actualizada',
    'nacionalidad'=>'prueba'
];

//editoriales

//var_dump($model_editorial->get('EDI001')); //get one or all if doesn't have parameter
//echo $model_editorial->insert($editorial); //insert
//echo $model_editorial -> delete('EDI903'); //delete
//echo $model_editorial -> update($editorial); //update

//autores

//var_dump($model_autor->get('AUT001')); //get one or all if doesn't have parameter
//echo $model_autor->insert($autor); //insert
//echo $model_autor -> delete('AUT013'); //delete
//echo $model_autor -> update($autor); //update