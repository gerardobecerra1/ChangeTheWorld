<?php
class UserSession
{
    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($objUser)
    {
        $_SESSION['id'] = $objUser->id_user;
        $_SESSION['rol'] = $objUser->role_user;
        $_SESSION['photo'] = $objUser->photo;
        $_SESSION['username'] = $objUser->username;
        $_SESSION['name'] = $objUser->name_user;
        $_SESSION['lastname'] = $objUser->last_name;
        $_SESSION['descrip'] = $objUser->description_user;
        $_SESSION['email'] = $objUser->email;
        $_SESSION['registered'] = $objUser->registered_date;
        $_SESSION['lastchange'] = $objUser->date_of_last_change;
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
