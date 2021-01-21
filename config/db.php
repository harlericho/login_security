<?php
class Conexion
{
    public static function _dbConexion()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=db_loginsecurity", "charlie", "charlie");
            return $pdo;
            //echo "Conectado";
        } catch (\Throwable $th) {
            die("Fallo Conexion: " . $th->getMessage());
        }
    }
}
//Conexion::_dbConexion();
