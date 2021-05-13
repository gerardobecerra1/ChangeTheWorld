<?php
include_once 'librerias/user_session.php';
class Usuario extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('usuario/index');
    }

    public function cerrarSesion()
    {
        $userSession = new UserSession();
        $userSession->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }
}
