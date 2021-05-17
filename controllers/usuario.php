<?php
include_once 'librerias/user_session.php';
class Usuario extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    public function render()
    {
        $this->view->render('usuario/index');
    }

    function verUsuario(){

    }

    public function updatePublic()
    {
        $tipoArchivo = null;
        $userSession = new UserSession();
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
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
            $photo = $_SESSION['photo'];
            $tipoArchivo = $_SESSION['pType'];
        }

        $id = (int) $_SESSION['id'];

        if(!empty($_POST['username'])){
            $username = $_POST['username'];
        }else{
            $username = $_SESSION['username'];
        }

        if(!empty($_POST['name'])){
            $name = $_POST['name'];
        }else{
            $name = $_SESSION['name'];
        }

        if(!empty($_POST['last'])){
            $last = $_POST['last'];
        }else{
            $last = $_SESSION['lastname'];
        }

        if(!empty($_POST['descrip'])){
            $descrip = $_POST['descrip'];
        }else{
            $descrip = $_SESSION['descrip'];
        }

        if ($this->model->updateUsuario(['id' => $id, 'photo' => $photo, 'pType' => $tipoArchivo, 'username' => $username, 'name' => $name, 'last' => $last, 'descrip' => $descrip])) {

            $_SESSION['photo'] = $photo;
            if (isset($tipoArchivo) && $tipoArchivo != '') {
                $_SESSION['pType'] = $tipoArchivo;
            }
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            $_SESSION['lastname'] = $last;
            $_SESSION['descrip'] = $descrip;

            $mensaje = "Actualización exitosa";

            header('Location:' . constant('URL') . 'Usuario');
        } else {
            $mensaje = "No se pudo realizar la actualización";
        }

        $this->view->mensaje = $mensaje;
    }

    public function cerrarSesion()
    {
        $userSession = new UserSession();
        $userSession->closeSession();
        header('Location:' . constant('URL') . 'Login');
    }
}
