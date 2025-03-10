<?php
class auto
{
    public $marca;
    private $modelo;
    private $color;
    private $image;

    function __construct($marca = 'Honda', $modelo = 'Civic', $color = 'Gris', $image = '../img/hondacivic.jpg')
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->image = $image;
    }

    function mostrar()
    {
        $tabla = "<div class='col-4 mb-3'>";
        $tabla .= "<div class='card'>";
        $tabla .= "<div class='card-header'>" . $this->marca . "</div>";
        $tabla .= "<img class='card-img-top' src='" . $this->image . "' alt='Card imagecap'>";
        $tabla .= "<div class='card-body'>";
        $tabla .= "<h5 class='card-title'>" . $this->marca . " " . $this->modelo . "</h5>";
        $tabla .= "<p class='card-text'> MODELO:" . $this->modelo . "<br>";
        $tabla .= "COLOR:" . $this->color . "</p>";
        $tabla .= "</div>";
        $tabla .= "</div>";
        $tabla .= "</div>";
        echo $tabla;
    }
}
