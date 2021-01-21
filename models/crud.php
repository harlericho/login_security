<?php
require_once "../config/db.php";
class Crud extends Conexion
{
    public static function _guardarUsuario($data)
    {
        try {
            $sql = "INSERT INTO login(nombres,dni,email,contrasena)
            VALUES(:nombres,:dni,:email,:contrasena)";
            $query = Conexion::_dbConexion()->prepare($sql);
            $query->bindParam(":nombres", $data['nombres'], PDO::PARAM_STR);
            $query->bindParam(":dni", $data['dni'], PDO::PARAM_STR);
            $query->bindParam(":email", $data['email'], PDO::PARAM_STR);
            $query->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Fallo Query: " . $th->getMessage());
        }
    }
    public static function _usuarioExistentedni($dni)
    {
        try {
            $sql = "SELECT * FROM login WHERE dni=:dni ";
            $query = Conexion::_dbConexion()->prepare($sql);
            $query->bindParam(":dni", $dni, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Fallo Query: " . $th->getMessage());
        }
    }
    public static function _usuarioExistenteemail($email)
    {
        try {
            $sql = "SELECT * FROM login WHERE email=:email ";
            $query = Conexion::_dbConexion()->prepare($sql);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Fallo Query: " . $th->getMessage());
        }
    }
    public static function _ingresarUsuario($data)
    {
        try {
            $sql = "SELECT * FROM login WHERE email=:email AND contrasena=:contrasena AND estado=:estado";
            $query = Conexion::_dbConexion()->prepare($sql);
            $query->bindParam(":email", $data['email'], PDO::PARAM_STR);
            $query->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            $query->bindParam(":estado", $data['estado'], PDO::PARAM_STR_CHAR);
            $query->execute();
            return $query->fetchAll();
        } catch (\Throwable $th) {
            die("Fallo Query: " . $th->getMessage());
        }
    }
    public static function _actualizarContrasena($data)
    {
        try {
            $sql = "UPDATE login SET contrasena=:contrasena WHERE email=:email";
            $query = Conexion::_dbConexion()->prepare($sql);
            $query->bindParam(":email", $data['email'], PDO::PARAM_STR);
            $query->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            return $query->execute();
        } catch (\Throwable $th) {
            die("Fallo Query: " . $th->getMessage());
        }
    }
}
