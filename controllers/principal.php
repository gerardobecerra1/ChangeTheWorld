<?php
include_once 'librerias/user_session.php';

class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->categorias = [];
    }

    public function render()
    {
        $categoriasAll = $this->model->get();
        $this->view->categorias = $categoriasAll;
        $this->view->render('principal/index');
    }

    public function cerrarSesion()
    {
        $userSession = new UserSession();
        $userSession->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }
}
