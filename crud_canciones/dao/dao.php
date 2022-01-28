<?php 

class Conexion
{
    private static $conn = null;

    private function __construct()
    {

    }
    public static function getConn()
    {
        if (self::$conn===null) {
            self::$conn = new PDO("sqlite:canciones.db");
        }
        return self::$conn;
    }
}

?>
