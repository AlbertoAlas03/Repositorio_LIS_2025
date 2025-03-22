<?php
require "Model.php";
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

    public function update($editorial = array())
    {
        $query = "update editoriales set nombre_editorial=:nombre_editorial,contacto=:contacto, telefono=:telefono where codigo_editorial=:codigo_editorial";
        return $this->set_query($query, $editorial);
    }
}

//crear model autores