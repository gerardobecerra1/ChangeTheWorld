<?php
include_once 'models/cursos.php';
class Curso extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->curso = new Cursos();
    }

    function render()
    {
        $this->view->render('curso/index');
    }

    function cargarCursos($param = null){
        $this->view->curso = $this->model->traerCurosPorId($param[0]);
        $this->render();
    }

}