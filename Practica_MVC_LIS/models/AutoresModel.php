<?php
require_once "Model.php";
class AutoresModel extends Model
{
    //get all data
    public function get($id = '')
    {
        if ($id == '') {
            $query = "Select * from Autores";
            return $this->get_query($query);
        } else {
            $query = "select * from Autores where codigo_autor=:codigo_autor";
            return $this->get_query($query, [':codigo_autor' => $id]);
        }
    }

    public function insert($editorial = array())
    {
        $query = "insert into Autores values(:codigo_autor,:nombre_autor,:nacionalidad)";
        return $this->set_query($query, $editorial);
    }

    public function delete($id = '')
    {
        $query = "delete from Autores where codigo_autor=:codigo_autor";
        return $this->set_query($query, ['codigo_autor' => $id]);
    }

    public function getById($codigo = '')
    {
        if (empty($codigo) || !is_string($codigo)) {
            return false;
        }

        $query = "SELECT * FROM Autores WHERE codigo_autor = :codigo_autor";
        $params = [':codigo_autor' => $codigo];

        $result = $this->get_query($query, $params);

        return (!empty($result)) ? $result[0] : false;
    }

    public function update($autor = [])
    {
        $required = ['codigo_autor', 'nombre_autor', 'nacionalidad'];
        foreach ($required as $field) {
            if (!isset($autor[$field])) {
                error_log("Campo requerido faltante: $field");
                return false;
            }
        }

        $query = "UPDATE Autores SET 
                  nombre_autor = :nombre_autor, 
                  nacionalidad = :nacionalidad 
                  WHERE codigo_autor = :codigo_autor";
        $params = [
            ':codigo_autor' => $autor['codigo_autor'],
            ':nombre_autor' => $autor['nombre_autor'],
            ':nacionalidad' => $autor['nacionalidad']
        ];

        $result = $this->set_query($query, $params);

        if ($result === false) {
            error_log("Error al actualizar autor: " . print_r($autor, true));
            return false;
        }

        return $result;
    }
}

//crear model autores