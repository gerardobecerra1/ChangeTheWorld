<?php
include_once 'librerias/user_session.php';

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->misCursos = [];
    }

    function render()
    {
        $this->view->render('dashboard/index');
    }

    function verUsuario($param = null){
        $emailUsuario = $param[0];
        $usuario = $this->model->getUsuarioByEmail($emailUsuario);

        $this->view->usuario = $usuario;
        header('Location:' . constant('URL') . 'Usuario');
    }

    function verMisCursos($param = null){
        $idCurso = $param[0];
        $cursos = $this->model->getById($idCurso);

        $this->view->misCursos = $cursos;
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