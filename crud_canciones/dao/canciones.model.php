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

    public function getById( $id) 
    {
        $sqlstr = "SELECT * from canciones where id = :id;";

        $comandoSql = $this->conn->prepare($sqlstr);
        $comandoSql->bindParam(':id', $id, SQLITE3_INTEGER);
        $comandoSql->execute();
        $cancion = $comandoSql->fetch(PDO::FETCH_ASSOC);
        
        return $cancion;
    }

    public function addNew($autor, $cancion, $genero)
    {
        $insSql = 'INSERT INTO canciones (autor, cancion, genero)'
        . ' values (:autor, :cancion, :genero);';

        $comandoSql = $this->conn->prepare($insSql);
        $comandoSql->bindParam(':autor', $autor, SQLITE3_TEXT);
        $comandoSql->bindParam(':cancion', $cancion, SQLITE3_TEXT);
        $comandoSql->bindParam(':genero', $genero, SQLITE3_TEXT);
        $resultado = $comandoSql->execute();
        return $resultado;
    }

    public function updateCancion($id, $autor, $cancion, $genero)
    {
        $updSql = 'UPDATE canciones SET autor=:autor, cancion=:cancion, genero=:genero where id=:id';

        $comandoSql = $this->conn->prepare($updSql);
        $comandoSql->bindParam(':autor', $autor, SQLITE3_TEXT);
        $comandoSql->bindParam(':cancion', $cancion, SQLITE3_TEXT);
        $comandoSql->bindParam(':genero', $genero, SQLITE3_TEXT);
        $comandoSql->bindParam(':id', $id, SQLITE3_INTEGER);

        $resultado = $comandoSql->execute();
        return $resultado;

    }

    public function deleteCancion($id)
    {
        $delSql = 'DELETE FROM canciones where id=:id';

        $comandoSql = $this->conn->prepare($delSql);
        $comandoSql->bindParam(':id', $id, SQLITE3_INTEGER);

        $resultado = $comandoSql->execute();
        return $resultado;
    }
}

?>
