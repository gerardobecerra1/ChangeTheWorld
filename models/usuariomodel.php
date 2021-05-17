<?php
class UsuarioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function updateUsuario($datos)
    {
        try {
            // $datos['photo'] = $this->db->connect()->quote($datos['photo']);
            $query = $this->db->connect()->prepare('CALL user_update_public(?, ?, ?, ?, ?, ?, ?)');
            $query->bindParam(1, $datos['id']);
            $query->bindParam(2, $datos['photo']);
            $query->bindParam(3, $datos['pType']);
            $query->bindParam(4, $datos['username']);
            $query->bindParam(5, $datos['name']);
            $query->bindParam(6, $datos['last']);
            $query->bindParam(7, $datos['descrip']);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
}
