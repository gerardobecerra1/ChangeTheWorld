<?php
include_once 'librerias/user_session.php';

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('dashboard/index');
    }

    function verMisCursos($param = null){
        var_dump($param);
    }

    function registrarCurso(){
    }

    public function cerrarSesion()
    {
        $userSession = new UserSession();
        $userSession->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }

}