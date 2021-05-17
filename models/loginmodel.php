<?php
class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertar($datos)
    {
        //StoredProcedure
        $md5pass = md5($datos['password']);

        try {
            $query = $this->db->connect()->prepare('CALL user_insert(?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $datos['role']);
            $query->bindParam(2, $datos['photo']);
            $query->bindParam(3, $datos['pType']);
            $query->bindParam(4, $datos['username']);
            $query->bindParam(5, $datos['name']);
            $query->bindParam(6, $datos['lastName']);
            $query->bindParam(7, $datos['descrip']);
            $query->bindParam(8, $datos['email']);
            $query->bindParam(9, $md5pass);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return false;
        }

    }

    public function userExist($datos)
    {
        $md5pass = md5($datos['password_user']); //encryptamos el password para mayor seguridad

        try {
            $query = $this->db->connect()->prepare('CALL user_exist(?,?,?)');
            $query->bindParam(1, $datos['role_user']);
            $query->bindParam(2, $datos['email']);
            $query->bindParam(3, $md5pass);
            $query->execute();
            if ($query->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            // echo $exc->getMessage();
            return false;
        }
    }

    public function setUser($email)
    {
        $user = new Usuario();

        try {
            $query = $this->db->connect()->prepare('CALL user_set(?)');
            $query->bindParam(1, $email);
            $query->execute();

            foreach ($query as $currentUser) {
                $user->id_user = $currentUser['id_user'];
                $user->role_user = $currentUser['role_user'];
                $user->photo = $currentUser['photo'];
                $user->pType = $currentUser['pType'];
                $user->username = $currentUser['username'];
                $user->name_user = $currentUser['name_user'];
                $user->last_name = $currentUser['last_name'];
                $user->description_user = $currentUser['description_user'];
                $user->email = $currentUser['email'];
                $user->password_user = $currentUser['password_user'];
                $user->registered_date = $currentUser['registered_date'];
                $user->date_of_last_change = $currentUser['date_of_last_change'];
            }
            return $user;

        } catch (PDOException $exc) {
            // echo $exc->getMessage();
            return null;
        }
    }
}
