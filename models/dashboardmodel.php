<?php
include_once 'models/usuario.php';
class DashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarioByEmail($email)
    {
        $item = new Usuario();

        $query = $this->db->connect()->prepare('CALL user_set(?)');
        try {
            $query->bindParam(1, $email);
            $query->execute();
            foreach ($query as $currentUser) {
                $item->id_user = $currentUser['id_user'];
                $item->role_user = $currentUser['role_user'];
                $item->photo = $currentUser['photo'];
                $item->username = $currentUser['username'];
                $item->name_user = $currentUser['name_user'];
                $item->last_name = $currentUser['last_name'];
                $item->description_user = $currentUser['description_user'];
                $item->email = $currentUser['email'];
                $item->password_user = $currentUser['password_user'];
                $item->registered_date = $currentUser['registered_date'];
                $item->date_of_last_change = $currentUser['date_of_last_change'];
            }
            return $item;
        } catch (PDOException $exc) {
            return false;
        }
    }
}
