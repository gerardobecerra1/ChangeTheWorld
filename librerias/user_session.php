<?php
class UserSession
{
    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($objUser, $type = null)
    {
        if (!$type) {
            $_SESSION['id'] = $objUser->id_user;
            $_SESSION['rol'] = $objUser->role_user;
            $_SESSION['photo'] = $objUser->photo;
            $_SESSION['pType'] = $objUser->pType;
            $_SESSION['username'] = $objUser->username;
            $_SESSION['name'] = $objUser->name_user;
            $_SESSION['lastname'] = $objUser->last_name;
            $_SESSION['descrip'] = $objUser->description_user;
            $_SESSION['email'] = $objUser->email;
            $_SESSION['registered'] = $objUser->registered_date;
            $_SESSION['lastchange'] = $objUser->date_of_last_change;
        } else {
            $_SESSION['id'] = $objUser[0];
            $_SESSION['rol'] =  $objUser[1];
            $_SESSION['photo'] =  $objUser[2];
            $_SESSION['pType'] = $objUser[3];
            $_SESSION['username'] =  $objUser[4];
            $_SESSION['name'] =  $objUser[5];
            $_SESSION['lastname'] =  $objUser[6];
            $_SESSION['descrip'] =  $objUser[7];
            $_SESSION['email'] =  $objUser[8];
            $_SESSION['registered'] =  $objUser[9];
            $_SESSION['lastchange'] =  $objUser[10];
        }
    }

    public function getCurrentUser()
    {
        return $_SESSION['username'];
    }

    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
