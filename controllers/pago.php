<?php
include_once 'librerias/user_session.php';

(new UserSession());

class Pago extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->curso = null;
    }

    function render()
    {
        $this->view->render('pago/index');
    }

    function compraCurso($param = null){
        $this->view->curso = $param[0];
        $this->render();
    }

    function hacerPago(){
        $idCourse = $_POST['cursoComprar'];
        if($this->model->insertarCompra($_SESSION['id'], $idCourse)){
            echo 0;
        }else{
            echo -1;
        }
    }
    
}