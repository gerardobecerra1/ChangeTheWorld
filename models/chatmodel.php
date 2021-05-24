<?php
include_once 'models/usuario.php';
class ChatModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function traerUsuarios(){
        $usuarios = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_usuarios()');
            $query->execute();
            while ($row = $query->fetch()) {
                if($row['id_user'] != $_SESSION['id']){
                $usuario = new Usuario();
                $usuario->id_user = $row['id_user'];
                $usuario->role_user = $row['role_user'];
                $usuario->photo = $row['photo'];
                $usuario->pType = $row['pType'];
                $usuario->username = $row['username'];
                $usuario->name_user = $row['name_user'];
                $usuario->last_name = $row['last_name'];
                $usuario->description_user = $row['description_user'];
                array_push($usuarios, $usuario);
                }
            }
            return $usuarios;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
    }

    function traerMensajePrivado(){
        // $usuarios = [];

        // try {
        //     $query = $this->db->connect()->prepare('CALL traer_usuarios()');
        //     $query->execute();
        //     while ($row = $query->fetch()) {
        //         if($row['id_user'] != $_SESSION['id']){
        //         $usuario = new Usuario();
        //         $usuario->id_user = $row['id_user'];
        //         $usuario->role_user = $row['role_user'];
        //         $usuario->photo = $row['photo'];
        //         $usuario->pType = $row['pType'];
        //         $usuario->username = $row['username'];
        //         $usuario->name_user = $row['name_user'];
        //         $usuario->last_name = $row['last_name'];
        //         $usuario->description_user = $row['description_user'];
        //         array_push($usuarios, $usuario);
        //         }
        //     }
        //     return $usuarios;
        // } catch (PDOException $exc) {
        //     echo 'error en el procedure';
        // }
    }
}