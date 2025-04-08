<?php
require_once "Model.php";
class EditorialesModel extends Model
{
    //get all data
    public function get($id = '')
    {
        if ($id == '') {
            $query = "Select * from Editoriales";
            return $this->get_query($query);
        } else {
            $query = "select * from Editoriales where codigo_editorial=:codigo";
            return $this->get_query($query, [':codigo' => $id]);
        }
    }

    public function insert($editorial = array())
    {
        $query = "insert into Editoriales values(:codigo_editorial,:nombre_editorial,:contacto,:telefono)";
        return $this->set_query($query, $editorial);
    }

    public function delete($id = '')
    {
        $query = "delete from Editoriales where codigo_editorial=:codigo_editorial";
        return $this->set_query($query, ['codigo_editorial' => $id]);
    }

    public function getById($codigo = '')
    {
        if (empty($codigo) || !is_string($codigo)) {
            return false;
        }

        $query = "SELECT * FROM Editoriales WHERE codigo_editorial = :codigo";
        $params = [':codigo' => $codigo];

        $result = $this->get_query($query, $params);

        return (!empty($result)) ? $result[0] : false;
    }

    public function update($editorial = [])
    {
        $required = ['codigo_editorial', 'nombre_editorial', 'contacto', 'telefono'];
        foreach ($required as $field) {
            if (!isset($editorial[$field])) {
                error_log("Campo requerido faltante: $field");
                return false;
            }
        }

        $query = "UPDATE Editoriales SET 
                  nombre_editorial = :nombre, 
                  contacto = :contacto, 
                  telefono = :telefono 
                  WHERE codigo_editorial = :codigo";
        $params = [
            ':nombre' => $editorial['nombre_editorial'],
            ':contacto' => $editorial['contacto'],
            ':telefono' => $editorial['telefono'],
            ':codigo' => $editorial['codigo_editorial']
        ];

        $result = $this->set_query($query, $params);

        if ($result === false) {
            error_log("Error al actualizar editorial: " . print_r($editorial, true));
            return false;
        }

        return $result;
    }
}

//crear model autores