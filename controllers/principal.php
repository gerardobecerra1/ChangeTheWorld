<?php
include_once 'librerias/user_session.php';

class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->recommended = [];
        $this->view->recent = [];
        $this->view->categorias = [];
    }

    public function render()
    {
        // //trae los cursos recomendados
        // $recommendedAll = $this->model->getReco();
        // $this->view->recommended = $recommendedAll;

        // //trae los cursos receintes
        // $recentAll = $this->model->getRecent();
        // $this->view->categorias = $recentAll;

        $categoriasAll = $this->model->getCategories();
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
