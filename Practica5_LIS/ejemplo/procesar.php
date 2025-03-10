<?php
include 'validaciones.php';
$errors = [];
session_start();
if (!empty($_POST)) {
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $carnet = $_POST['carnet'] ?? '';

    if (empty(trim($nombres))) {
        array_push($errors, 'Se debe ingresar los nombres');
    } else if (!isText(trim($nombres))) {
        array_push($errors, 'nombres no validos');
    }

    if (empty(trim($apellidos))) {
        array_push($errors, 'Se debe ingresar los apellidos');
    } else if (!isText(trim($apellidos))) {
        array_push($errors, 'apellidos no validos');
    }

    if (empty(trim($carnet))) {
        array_push($errors, 'Se debe ingresar el carnet');
    } else if (!isCarnet(trim($carnet))) {
        array_push($errors, 'carnet no valido');
    }

    if (empty(trim($telefono))) {
        array_push($errors, 'Se debe ingresar el telefono');
    } else if (!isPhone(trim($telefono))) {
        array_push($errors, 'Formato de telefono no valido');
    }


    if (empty(trim($correo))) {
        array_push($errors, 'Se debe ingresar el correo');
    } else if (!isEmail(trim($correo))) {
        array_push($errors, 'Formato de correo no valido');
    }

    if (empty($errors)) {
        echo '<h1>Usuario registrado correctamente</h1>';
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['datos'] = [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'carnet' => $carnet,
            'telefono' => $telefono,
            'correo' => $correo,
        ];
        header('Location:index.php');
    }
}
