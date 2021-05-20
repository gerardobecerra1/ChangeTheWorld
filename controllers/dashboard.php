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

    function registrarCurso(){
        $photo = null;
        $tipoArchivo = null;
        if (!empty($_FILES['image']['name'])) {
            $tipoArchivo = $_FILES['image']['type'];
            $permitido = array('image/png', 'image/jpg', 'image/jpeg');
            if (!in_array($tipoArchivo, $permitido)) {
                $mensaje = "Solo se pueden subir imágenes";
            } else {
            $tamanoArchivo = $_FILES['image']['size'];
            $imagenSubida = fopen($_FILES['image']['tmp_name'], 'r');
            $photo = fread($imagenSubida, $tamanoArchivo);
            }

        } else {
            $photo = null;
            $tipoArchivo = null;
        }

        $categoria = $_POST['role_dash'];
        $title = $_POST['inputTitle'];
        $shortD = $_POST['ShortD'];
        $price = $_POST['inputPrice'];
        $longD = $_POST['longD'];

        if ($this->model->insertarCurso(['categoria'=> $categoria,'usuario'=> $_SESSION['id'],
        'logo'=>$photo,'logo_tipo'=> $tipoArchivo, 'titulo'=> $title,'rating'=> 0.0,'shortD'=>$shortD, 
        'longD'=>$longD,'numberV'=>0,'price'=> (float)$price])) {
            header('Location:' . constant('URL') . 'Dashboard');
        } else {
            $mensaje = "No se pudo realizar el registro";
        }
    }

    public function cerrarSesion()
    {
        (new UserSession())->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }

}