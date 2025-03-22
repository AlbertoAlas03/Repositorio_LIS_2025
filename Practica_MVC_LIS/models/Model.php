<?php

//no vamos a crear instancia de model
abstract class Model
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'inventario_libros';
    protected $conn;
    //opening db_connection
    protected function open_db()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name;charset=utf8", $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //closing db_connection
    protected function close_db()
    {
        $this->conn = null;
    }

    protected function get_query($query, $params = array())
    {
        try {
            $rows = [];
            $this->open_db();
            $stm = $this->conn->prepare($query);
            $stm->execute($params);
            //fetching data
            while ($rows[] = $stm->fetch(PDO::FETCH_ASSOC));
            $this->close_db();
            array_pop($rows);
            return $rows;
        } catch (Exception $e) {
            echo $e->getMessage();
            $this->close_db();
            return [];
        }
    }

    protected function set_query($query, $params = array())
    {
        try {
            $this->open_db();
            $stm = $this->conn->prepare($query);
            $stm->execute($params);
            $affectedRows = $stm->rowCount();
            $this->close_db();
            return $affectedRows;
        } catch (Exception $e) {
            $this->close_db();
            echo $e->getMessage();
            return 0;
        }
    }
}
