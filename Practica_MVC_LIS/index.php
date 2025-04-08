<?php
include_once 'controllers/EditorialesController.php'; 
include_once 'controllers/IndexController.php';
include_once 'controllers/AutoresController.php'; 

const PATH='/Practica_MVC'; //cadena constante por si movemos las cosas

$url = $_SERVER['REQUEST_URI'];
$slice=explode('/',$url);
//print_r($slice);
$controller=empty($slice[2])?"IndexController":$slice[2]."Controller";
$method=empty($slice[3])?"Index":$slice[3];
$params = empty($slice[4])?[]:array_slice($slice,4);

$cont = new $controller;
$cont->$method($params);

//todas nuestras peticiones pasan por este archivo
?>