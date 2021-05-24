<?php
include_once 'models/cursos.php';
include_once 'models/video.php';
include_once 'models/recurso.php';
include_once 'models/usuario.php';
include_once 'models/ccurso.php';
include_once 'librerias/user_session.php';

(new UserSession());
class Curso extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->curso = new Cursos();
        $this->view->videosIntro = new Video();
        $this->view->videosBasic = new Video();
        $this->view->videosMedium = new Video();
        $this->view->videosAdvance =new Video();
        $this->view->creadorCurso = new Usuario();
        $this->view->Resources = new Recurso();
        $this->view->comentarios = new Ccurso();
        $this->view->completo = null;
    }

    function render()
    {
        $this->view->render('curso/index');
    }

    function cargarCursos($param = null){
        $this->view->curso = $this->model->traerCurosPorId($param[0]);
        $this->view->videosIntro = $this->model->traerVideosPorNivel($param[0],0);
        $this->view->videosBasic = $this->model->traerVideosPorNivel($param[0],1);
        $this->view->videosMedium = $this->model->traerVideosPorNivel($param[0],2);
        $this->view->videosAdvance = $this->model->traerVideosPorNivel($param[0],3);
        $this->view->creadorCurso = $this->model->traerCreadorCurso($param[0]);
        $this->view->Resources = $this->model->traerRecursosPorCurso($param[0]);
        $this->view->comentarios = $this->model->traerComentarioCurso($param[0]);
        if(isset($param[1])){
            $this->view->completo = $param[1];
        }
        $this->render();
    }

    function agregarCR(){
        $idC = $_POST['idC'];
        $idU = $_POST['idU'];
        $rating = $_POST['rating'];
        $comment = $_POST['comentFinal'];
        // echo $idC.' '.$idU.' '.$rating.' '.$comment;
        if($this->model->insertarCFinal(['course'=>$idC,'user'=>$idU,'coment'=>$comment,'dia'=>date('Y-m-d')])){
           if($this->model->insertR(['course'=>$idC,'user'=>$idU,'rating'=>$rating])){
            $this->model->promedioR($idC);
               echo 0;
           }
        }else{
            echo -1;
        }
    }

}