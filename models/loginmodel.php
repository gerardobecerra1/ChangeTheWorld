<?php
class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertar($datos)
    {
        $md5pass = md5($datos['password']);
        //insertar datos en la base de datos
        try {
            $query = $this->db->connect()->prepare('INSERT INTO `tbl_users`(`id_user`, `role_user`, `photo`, `username`, `name_user`, `last_name`, `description_user`, `email`, `password_user`, `registered_date`, `date_of_last_change`) VALUES (:id,:role_user,:photo,:username,:name_user,:lastName,:descrip,:email,:password_user,:registered,:last_date)');
            $query->execute(['id' => $datos['id'], 'photo' => $datos['photo'], 'role_user' => $datos['role'], 'username' => $datos['username'], 'name_user' => $datos['name'], 'lastName' => $datos['lastName'], 'descrip' => $datos['descrip'], 'email' => $datos['email'], 'password_user' => $md5pass, 'registered' => $datos['registered'], 'last_date' => $datos['last_date']]);
            return true;
        } catch (PDOException $exc) {
            // echo $exc->getMessage();
            return false;
        }
        // $categorias = [];
        //     try {
        //         $query = $this->db->connect()->prepare("CALL spGetCategorias(?,?)");
        //          $query->bindParam(1, "i");
        //          $query->bindParam(2, $var2);
        //         $query->execute();
        //         while($row = $query->fetch()){
        //             $categoria = $row['nombre'];
        //             array_push($categorias, $categoria);
        //         }

        //         return $categorias;
        //     }  catch (PDOException $e) {
        //         return null;
        //     }

    }

    public function userExist($datos)
    {
        $md5pass = md5($datos['password_user']); //encryptamos el password para mayor seguridad

        try {
            $query = $this->db->connect()->prepare('SELECT * FROM `tbl_users` WHERE role_user = :role_user AND email = :email AND password_user = :password_user');
            $query->execute(['role_user' => $datos['role_user'], 'email' => $datos['email'], 'password_user' => $md5pass]);
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
            $query = $this->db->connect()->prepare('SELECT * FROM `tbl_users` WHERE email = :email');
            $query->execute(['email' => $email]);

            foreach ($query as $currentUser) {
                $user->id_user = $currentUser['id_user'];
                $user->role_user = $currentUser['role_user'];
                $user->photo = $currentUser['photo'];
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