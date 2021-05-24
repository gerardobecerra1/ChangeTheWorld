<?php
include_once 'librerias/user_session.php';
include_once 'models/cursos.php';

(new UserSession());

class Mycourse extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->misCursos = new Cursos();
    }

    function render()
    {    
        $this->view->misCursos = $this->model->traerCursosComprados($_SESSION['id']);
        foreach($this->view->misCursos as $porcentaje){
            $porcentaje->porciento = $this->model->traerPorciento($porcentaje->id_course,$_SESSION['id']);
        }
        $this->view->render('mycourse/index');
    }

}