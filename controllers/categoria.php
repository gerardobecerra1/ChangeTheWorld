<?php
include_once 'models/cursos.php';
class Categoria extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->cursosCategoria = new Cursos();
        $this->view->nameCategoria = nulL;
    }

    function render()
    {
        $this->view->render('categoria/index');
    }

    function cargarCursos($param = null){
        $this->view->nameCategoria = $param[0];
        $this->view->cursosCategoria = $this->model->traerCurosPorCategoria($param[1]);
        $this->render();
    }
}