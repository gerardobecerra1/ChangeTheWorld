<?php
include_once 'models/usuario.php';
include_once 'librerias/user_session.php';

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->me = new Usuario();
        $this->view->mensaje = "";
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function registrarUsuario()
    {
        $role = $_POST['role'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $mensaje = "";

        if ($this->model->insertar(['role' => $role, 'username' => $username, 'name' => $name, 'lastName' => $lastName, 'email' => $email, 'password' => $password])) {
            $mensaje = "Registro Exitoso";
        } else {
            $mensaje = "El email ya está registrado";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }

    public function inicioSesion()
    {
        $userSession = new UserSession();
        $mensaje = "";
        $role = $_POST['role_login'];
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        if ($this->model->userExist(['role_user' => $role, 'email' => $email, 'password_user' => $password])) {

            $this->view->me = $this->model->setUser($email);

            if ($role == "Teacher") {
                $userSession->setCurrentUser($this->view->me);
                header('Location:' . constant('URL') . 'Dashboard');
            } else {
                $userSession->setCurrentUser($this->view->me);
                header('Location:' . constant('URL') . 'Principal');
            }
        } else {
            $mensaje = "El rol ,contraseña o email no son correctos";
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }

}
