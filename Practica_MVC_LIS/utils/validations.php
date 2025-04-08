<?php

function isText($var)
{
    return preg_match("/^[a-zA-Z áéíóúÁÉÍÓÚ]+$/", $var);
}

function isCarnet($var)
{
    return preg_match("/^[A-Z]{2}[0-9]{6}$/", $var);
}

function isPhone($var)
{
    return preg_match("/^[267][0-9]{3}-?[0-9]{4}$/", $var);
}

function isMail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function isCodeEditorial($codigo)
{
    return preg_match('/^EDI\d{3}$/', $codigo); // EDI seguido de 3 dígitos
}

function isCodeAutor($codigo)
{
    return preg_match('/^AUT\d{3}$/', $codigo);
}
