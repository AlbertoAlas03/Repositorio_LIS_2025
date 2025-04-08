<?php

require_once "Controller.php";
require_once "models/EditorialesModel.php";
include_once "utils/validations.php";

class EditorialesController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new EditorialesModel();
    }

    public function index()
    {
        $viewBag = [];
        $viewBag['editoriales'] = $this->model->get();
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
            $editorial['codigo_editorial'] = $_POST['codigo_editorial'];
            $editorial['nombre_editorial'] = $_POST['nombre_editorial'];
            $editorial['contacto'] = $_POST['contacto'];
            $editorial['telefono'] = $_POST['telefono'];

            if (!isCodeEditorial($editorial['codigo_editorial'])) {
                array_push($errores, 'El código debe seguir el formato EDIxxx');
            } else if (empty($editorial['nombre_editorial'])) {
                array_push($errores, 'Debes ingresar el nombre del editorial');
            } else if (!isText($editorial['contacto'])) {
                array_push($errores, 'Contacto erroneo');
            } else if (!isPhone($editorial['telefono'])) {
                array_push($errores, 'El telefono ingresado no tiene el formato correcto');
            }
            if (count($errores) == 0) {
                if ($this->model->insert($editorial) != 0) {
                    header('location:' . PATH . '/Editoriales');
                } else {
                    array_push($errores, 'Ya existe un editorial con este codigo');
                    $viewBag['errores'] = $errores;
                    $viewBag['editorial'] = $editorial; //para conservar los valores al fallar algo, atravez de esta variable comunicamos la vista y el controller
                    $this->render('new.php', $viewBag);
                }
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['editorial'] = $editorial; //para conservar los valores al fallar algo, atravez de esta variable comunicamos la vista y el controller
                $this->render('new.php', $viewBag);
            }
        }
    }

    public function delete($params)
    {
        $codigo = $params[0];
        $this->model->delete($codigo);
        header('location:' . PATH . '/Editoriales');
    }


    public function updateEditorial($params = [])
    {
        $viewBag = array();
        $codigo = $params[0] ?? null;
        if (!$codigo) {
            header('location:' . PATH . '/Editoriales');
            exit();
        }
        $editorial = $this->model->getById($codigo);

        if (!$editorial) {
            header('location:' . PATH . '/Editoriales');
            exit();
        }

        $viewBag['editorial'] = $editorial;
        $this->render('update.php', $viewBag);
    }

    public function processUpdate()
    {
        $viewBag = array();
        $errores = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $editorial = [
                'codigo_editorial' => $_POST['codigo_editorial'] ?? '',
                'nombre_editorial' => $_POST['nombre_editorial'] ?? '',
                'contacto' => $_POST['contacto'] ?? '',
                'telefono' => $_POST['telefono'] ?? ''
            ];

            if (empty($editorial['nombre_editorial'])) {
                array_push($errores, 'Debes ingresar el nombre del editorial');
            }
            if (!isText($editorial['contacto'])) {
                array_push($errores, 'Contacto erroneo');
            }
            if (!isPhone($editorial['telefono'])) {
                array_push($errores, 'El telefono ingresado no tiene el formato correcto');
            }
            if (count($errores) === 0) {
                if ($this->model->update($editorial)) {
                    header('location:' . PATH . '/Editoriales');
                    exit();
                } else {
                    array_push($errores, 'Error al actualizar el editorial');
                }
            }

            $viewBag['errores'] = $errores;
            $viewBag['editorial'] = $editorial;
            $this->render('update.php', $viewBag);
        }
    }
}
