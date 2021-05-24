<?php
include_once 'librerias/user_session.php';
include_once 'models/video.php';
(new UserSession());
class Videos extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->info = new Video();
    }

    function render()
    {
        $this->view->render('videos/index');
    }

    function traerVideo($param = null){
        $this->view->info = $this->model->infoVideo($param[0]);
        $this->model->visto($_SESSION['id'],$param[0]);
        $this->render();
    }  
}