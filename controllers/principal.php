<?php
include_once 'librerias/user_session.php';
include_once 'models/categoria.php';
include_once 'models/cursos.php';

class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->calificados = new Cursos();
        $this->view->vendidos = new Cursos();
        $this->view->recientes = new Cursos();
        $this->view->categorias = new Categoria();
    }

    public function render()
    {
        $this->view->calificados = $this->model->getMejorCalificados();
        // $this->view->vendidos = $this->model->getMasVendidos();
        $this->view->recientes = $this->model->getRecientes();
        $this->view->categorias = $this->model->getCategories();
        $this->view->render('principal/index');
    }

    public function cerrarSesion()
    {
        $userSession = new UserSession();
        $userSession->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }
}
