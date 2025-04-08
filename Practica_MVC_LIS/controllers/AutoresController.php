<?php

require_once "Controller.php";
require_once "models/AutoresModel.php";
include_once "utils/validations.php";

class AutoresController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new AutoresModel();
    }

    public function index()
    {
        $viewBag = [];
        $viewBag['autores'] = $this->model->get();
        $this->render("index.php", $viewBag);
    }

    public function create()
    {
        //echo "creating new editorial";
        $this->render("new.php");
    }

    public function insert() //getting all data by POST from the form
    {
        $viewBag = array();
        if (isset($_POST)) {
            $errores = array();
            $autor['codigo_autor'] = $_POST['codigo_autor'];
            $autor['nombre_autor'] = $_POST['nombre_autor'];
            $autor['nacionalidad'] = $_POST['nacionalidad'];

            if (!isCodeEditorial($autor['codigo_autor'])) {
                array_push($errores, 'El código debe seguir el formato AUTxxx');
            } else if (empty($autor['nombre_autor'])) {
                array_push($errores, 'Debes ingresar el nombre del autor');
            } else if (!isText($autor['nacionalidad'])) {
                array_push($errores, 'Nacionalidad erronea');
            }
            if (count($errores) == 0) {
                if ($this->model->insert($autor) != 0) {
                    header('location:' . PATH . '/Autores');
                } else {
                    array_push($errores, 'Ya existe un autor con este codigo');
                    $viewBag['errores'] = $errores;
                    $viewBag['autor'] = $autor; //para conservar los valores al fallar algo, atravez de esta variable comunicamos la vista y el controller
                    $this->render('new.php', $viewBag);
                }
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['autor'] = $autor; //para conservar los valores al fallar algo, atravez de esta variable comunicamos la vista y el controller
                $this->render('new.php', $viewBag);
            }
        }
    }

    public function delete($params)
    {
        $codigo = $params[0];
        $this->model->delete($codigo);
        header('location:' . PATH . '/Autores');
    }


    public function updateAutor($params = [])
    {
        $viewBag = array();
        $codigo = $params[0] ?? null;
        if (!$codigo) {
            header('location:' . PATH . '/Autores');
            exit();
        }
        $editorial = $this->model->getById($codigo);

        if (!$editorial) {
            header('location:' . PATH . '/Autores');
            exit();
        }

        $viewBag['autor'] = $editorial;
        $this->render('update.php', $viewBag);
    }

    public function processUpdate()
    {
        $viewBag = array();
        $errores = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $autor = [
                'codigo_autor' => $_POST['codigo_autor'] ?? '',
                'nombre_autor' => $_POST['nombre_autor'] ?? '',
                'nacionalidad' => $_POST['nacionalidad'] ?? ''
            ];

            if (empty($autor['nombre_autor'])) {
                array_push($errores, 'Debes ingresar el nombre del autor');
            }
            if (!isText($autor['nacionalidad'])) {
                array_push($errores, 'Contacto erroneo');
            }
            if (count($errores) === 0) {
                if ($this->model->update($autor)) {
                    header('location:' . PATH . '/Autores');
                    exit();
                } else {
                    array_push($errores, 'Error al actualizar el autor');
                }
            }

            $viewBag['errores'] = $errores;
            $viewBag['autor'] = $autor;
            $this->render('update.php', $viewBag);
        }
    }
}
