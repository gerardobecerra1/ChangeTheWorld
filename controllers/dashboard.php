<?php
require 'librerias/user_session.php';
include_once 'models/categoria.php';
include_once 'models/cursos.php';

(new UserSession());

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->view->misCursos = [];

        $this->view->miscursos = new Cursos();
        $this->view->categorias = new Categoria();
    }

    function render()
    {        
        $this->view->miscursos = $this->model->traerCursoUsuario($_SESSION['id']);
        $this->view->categorias = $this->model->getCategories();
        $this->view->render('dashboard/index');
    }

    function AgregarCategoria($param = null){
        $nombre_categoria = $param[0];
        if(empty($nombre_categoria)){
            $mensaje = 'No puede estar vacio el campo';
        }else{
            if($this->model->insertarCategoria($nombre_categoria)){
                $mensaje = 'Se agrego correctamente la categoria';
            }else{
                $mensaje = 'No se pudo agregar la categoria';
            }
        }

        echo $mensaje;
    }

    function mostrarCursosAjax(){
       $cursos = $this->model->traerCursoUsuario($_SESSION['id']);
      
       foreach ($cursos as $row) {
        // <button id="btn_mycourse_edit" class="btn main-color ml-1 mr-1" value="'.$row->id_course.'."><i
        // class="far fa-edit"></i></button>
        $ventasCurso = $this->model->ventasPorCurso($row->id_course);
        $totalVentasCurso = $this->model->totalVentasPorCurso($row->id_course);
        echo '<div class="col-lg-4 mb-3">
                <div class="card">
                    <img src="'.'data:'.$row->lType.';base64,'.base64_encode($row->logo).'"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$row->title.'</h5>
                        <p class="card-text">'.$row->short_description.'</p>
                        <div class="botones text-center mt-3 d-flex">
                            <button class="btn btn_mycourse_videos main-color ml-1 mr-1" onclick="agrergarVideos(this)" value="'.$row->id_course.'"><i
                                    class="fas fa-film"></i> Add</button>
                        </div>
                        <div class="sales my-2">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="text-muted text-center ">Sales:</h6>
                                    <h3 class="font-weight-bold main-color text-center">'.$ventasCurso.'</h3>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-muted text-center">Income:</h6>
                                    <h3 class="font-weight-bold main-color text-center">$'.$totalVentasCurso.'</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> ';
       }
      
    }

    function mostrarTotalTodo($param = null){
        $numC = $this->model->traerNumCursosM($param[0]);
        $numE = $this->model->traerNumEstu($param[0]);
        $generalV = $this->model->traerVenGen($param[0]);
        
        echo '<div class="col-lg-4 my-3  ">
        <h6 class="text-muted text-center ">TOTAL COURSES:</h6>
        <h1 class="font-weight-bold main-color text-center ">'.$numC.'</h1>
    </div>
    <div class="col-lg-4 my-3  ">
        <h6 class="text-muted text-center ">TOTAL STUDENTS:</h6>
        <h1 class="font-weight-bold main-color text-center ">'.$numE.'</h1>
    </div>
    <div class="col-lg-4 my-3  ">
        <h6 class="text-muted text-center ">TOTAL EARNINGS:</h6>
        <h1 class="font-weight-bold main-color text-center ">$'.$generalV.'</h1>
    </div>';
    }

    function mostrarVideosAjax($param = null){
        $videos =  $this->model->traerVideosUsuarioPorNivel($param[0],$param[1]);
        foreach ($videos as $row) {
            // $row->id_video;
            // $row->fk_course;
            // $row->title;
            // $row->short_description;
            // $row->content;
            // $row->contentT;
            // $row->level_;
            if($row->viewed) {
                echo '<a><i class="fas fa-play-circle"></i> '.$row->title.' (Free)</a>'; 
            }else{
                echo '<a><i class="fas fa-play-circle"></i> '.$row->title.' (Payment)</a>';
            }
        }
    }

    function mostrarRecursosAjax($param = null){
        $recursos =  $this->model->traerRecursosPorCurso($param[0]);
        foreach ($recursos as $row) {
            if($row->categorie == "Media"){
                echo '<a><i class="fas fa-photo-video"></i> '.$row->contentName.'</a>';
            }else if($row->categorie == "File"){
                echo '<a><i class="fas fa-file-pdf"></i> '.$row->contentName.'</a>';
            }else{
                echo '<a><i class="fas fa-link"></i> '.$row->link.'</a>';
            }
        }
    }

    function registrarCurso(){
        $photo = null;
        $tipoArchivo = null;
        if (!empty($_FILES['image']['name'])) {
            $tipoArchivo = $_FILES['image']['type'];
            $permitido = array('image/png', 'image/jpg', 'image/jpeg');
            if (!in_array($tipoArchivo, $permitido)) {
                $mensaje = "Solo se pueden subir im??genes";
            } else {
            $tamanoArchivo = $_FILES['image']['size'];
            $imagenSubida = fopen($_FILES['image']['tmp_name'], 'r');
            $photo = fread($imagenSubida, $tamanoArchivo);
            }

        }

        $categoria = $_POST['role_dash'];
        $title = $_POST['inputTitle'];
        $shortD = $_POST['ShortD'];
        $price = $_POST['inputPrice'];
        $longD = $_POST['longD'];

        if ($this->model->insertarCurso(['categoria'=> $categoria,'usuario'=> $_SESSION['id'],
        'logo'=>$photo,'logo_tipo'=> $tipoArchivo, 'titulo'=> $title,'rating'=> 0.0,'shortD'=>$shortD, 
        'longD'=>$longD,'numberV'=>0,'price'=> (float)$price])) {
            echo  $mensaje = 0;
        } else {
           echo  $mensaje = -1;
        }
    }

    function AgregarVideoIntro(){

        $video = null;
        $videoType = null;

        if (!empty($_FILES['selectVideoIntro']['name'])) {
            $videoType = $_FILES['selectVideoIntro']['type'];
            $permitido = array('video/mp4');
            if (!in_array($videoType, $permitido)) {
                 return $mensaje = "";
            } else {
            $tamanoArchivo = $_FILES['selectVideoIntro']['size'];
            $videoSubido = fopen($_FILES['selectVideoIntro']['tmp_name'], 'r');
            $video = fread($videoSubido, $tamanoArchivo);
            }
        }

        $id_curso = $_POST['introductionIdCourse'];
        $title = $_POST['inputTitleVideoIntro'];
        $shortD = $_POST['shortVideoTitle'];
        $level = $_POST['introductionLevel'];
        $free = $_POST['introductionFree'];

        if($this->model->insertarVideoIntroduction(['id_curso' =>  $id_curso,'title'=> $title,'shortD'=> $shortD,'video'=>$video,'typeV'=> $videoType,'free'=>$free,'level'=>$level])){
            return 0;
        }else{
            return -1;
        }
    }

    function AgregarVideoBasic(){

        $video = null;
        $videoType = null;

        if (!empty($_FILES['selectVideoBasic']['name'])) {
            $videoType = $_FILES['selectVideoBasic']['type'];
            $permitido = array('video/mp4');
            if (!in_array($videoType, $permitido)) {
                 return $mensaje = "";
            } else {
            $tamanoArchivo = $_FILES['selectVideoBasic']['size'];
            $videoSubido = fopen($_FILES['selectVideoBasic']['tmp_name'], 'r');
            $video = fread($videoSubido, $tamanoArchivo);
            }
        }

        $id_curso = $_POST['basicIdCourse'];
        $title = $_POST['inputTitleVideoBasic'];
        $shortD = $_POST['shortVideoTitleBasic'];
        $level = $_POST['basicLevel'];
        $free = $_POST['basicFree'];

        // echo $id_curso.' '.$title.' '.$shortD.' '.$level.' '.$free.' '.$videoType;

        if($this->model->insertarVideoIntroduction(['id_curso' =>  $id_curso,'title'=> $title,'shortD'=> $shortD,'video'=>$video,'typeV'=> $videoType,'free'=>$free,'level'=>$level])){
            return 0;
        }else{
            return -1;
        }
    }

    function AgregarVideoMedium(){

        $video = null;
        $videoType = null;

        if (!empty($_FILES['selectVideoMedium']['name'])) {
            $videoType = $_FILES['selectVideoMedium']['type'];
            $permitido = array('video/mp4');
            if (!in_array($videoType, $permitido)) {
                 return $mensaje = "";
            } else {
            $tamanoArchivo = $_FILES['selectVideoMedium']['size'];
            $videoSubido = fopen($_FILES['selectVideoMedium']['tmp_name'], 'r');
            $video = fread($videoSubido, $tamanoArchivo);
            }
        }

        $id_curso = $_POST['mediumIdCourse'];
        $title = $_POST['inputTitleVideoMedium'];
        $shortD = $_POST['shortVideoTitleMedium'];
        $level = $_POST['mediumLevel'];
        $free = $_POST['mediumFree'];

        if($this->model->insertarVideoIntroduction(['id_curso' =>  $id_curso,'title'=> $title,'shortD'=> $shortD,'video'=>$video,'typeV'=> $videoType,'free'=>$free,'level'=>$level])){
            return 0;
        }else{
            return -1;
        }
    }

    function AgregarVideoAdvanced(){

        $video = null;
        $videoType = null;

        if (!empty($_FILES['selectVideoAdvanced']['name'])) {
            $videoType = $_FILES['selectVideoAdvanced']['type'];
            $permitido = array('video/mp4');
            if (!in_array($videoType, $permitido)) {
                 return $mensaje = "";
            } else {
            $tamanoArchivo = $_FILES['selectVideoAdvanced']['size'];
            $videoSubido = fopen($_FILES['selectVideoAdvanced']['tmp_name'], 'r');
            $video = fread($videoSubido, $tamanoArchivo);
            }
        }

        $id_curso = $_POST['advancedIdCourse'];
        $title = $_POST['inputTitleVideoAdvanced'];
        $shortD = $_POST['shortVideoTitleAdvanced'];
        $level = $_POST['advancedLevel'];
        $free = $_POST['advancedFree'];

        if($this->model->insertarVideoIntroduction(['id_curso' =>  $id_curso,'title'=> $title,'shortD'=> $shortD,'video'=>$video,'typeV'=> $videoType,'free'=>$free,'level'=>$level])){
            return 0;
        }else{
            return -1;
        }
    }

    function AgregarRecurso(){
        $resource = null;
        $resourceType = null;
        $resourceName = null;

        if (!empty($_FILES['selectresource']['name'])) {
            $resourceName = $_FILES['selectresource']['name'];
            $resourceType = $_FILES['selectresource']['type'];
            $permitido = array('video/mp4','image/png', 'image/jpg', 'image/jpeg','application/pdf');
            if (!in_array($resourceType, $permitido)) {
                 return $mensaje = "";
            } else {
            $tamanoArchivo = $_FILES['selectresource']['size'];
            $recursoSubido = fopen($_FILES['selectresource']['tmp_name'], 'r');
            $resource = fread($recursoSubido, $tamanoArchivo);
            }
        }

        $id_curso = $_POST['recursoIdCourse'];
        $categoria = $_POST['role_resource'];
        $link = !empty($_POST['inputLink']) ? $_POST['inputLink']: null;

        echo $id_curso.' '.$categoria.' '.$link.' '.$resourceType.' '.$resource;

        $this->model->insertarResource(['id_curso'=>$id_curso,'name'=> $resourceName,'content'=>$resource,'typeC'=>$resourceType,'link'=>$link,'categoria'=>$categoria]);
    }

    public function cerrarSesion()
    {
        (new UserSession())->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }

}