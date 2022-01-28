<?php
require_once "dao/dao.php";

class CancionesModel
{
    private $conn = null;
    public function __construct()
    {
        $this->conn = Conexion::getConn();
        $sqlCreateTable = " CREATE TABLE IF NOT EXISTS canciones
            ( id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            cancion STRING NOT NULL,
            autor STRING NOT NULL,
            genero STRING NOT NULL
            );";
        $this->conn->exec($sqlCreateTable);
    }

    public function getAll()
    {
        $sqlstr = "SELECT * from canciones;";
        $arrCanciones = array();
        $cursor = $this->conn->query($sqlstr, PDO::FETCH_ASSOC);
        $arrCanciones = $cursor->fetchAll();
        return $arrCanciones;
    }
}

?>
