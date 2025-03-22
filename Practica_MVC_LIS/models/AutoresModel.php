<?php
require "Model.php";
class AutoresModel extends Model{
    public function get($id = ''){
        if ($id == '') {
            $query = "Select * from autores";
            return $this->get_query($query);
        } else {
            $query = "select * from autores where codigo_autor=:codigo";
            return $this->get_query($query, [':codigo' => $id]);
        }
    }
    public function insert($autor = array()){
        $query = "insert into autores values(:codigo_autor,:nombre_autor,:nacionalidad)";
        return $this->set_query($query, $autor);
    }
    public function delete($id = ''){
        $query = "delete from autores where codigo_autor=:codigo_autor";
        return $this->set_query($query, ['codigo_autor' => $id]);
    }
    public function update($autor = array()){
        $query = "update autores set nombre_autor=:nombre_autor,nacionalidad=:nacionalidad where codigo_autor=:codigo_autor";
        return $this->set_query($query, $autor);
    }
} 
?>