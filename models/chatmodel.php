<?php
include_once 'models/chatperrones.php';

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

    function traerMensajePrivado($Recibe,$manda){
        $memsajes = [];

        try {
            $query = $this->db->connect()->prepare('CALL traerMensajesPrivados(?,?)');
            $query->bindParam(1, $Recibe);
            $query->bindParam(2, $manda);
            $query->execute();
            while ($row = $query->fetch()) {
                $chat = new ChatPerrones();
                $chat->_message = $row['_message'];
                $chat->date_message = $row['date_message'];
                $chat->username = $row['username'];
                array_push($memsajes, $chat);
            }
            return $memsajes;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
        echo 'mensaje que mando el usuario y los mios';
    }

    function insertarMensaje($recibe,$manda,$mensaje){
        try {
            $query = $this->db->connect()->prepare('CALL insertar_privados(?,?,?)');
            $query->bindParam(1, $manda);
            $query->bindParam(2, $recibe);
            $query->bindParam(3, $mensaje);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
           return false;
        }
    }
}