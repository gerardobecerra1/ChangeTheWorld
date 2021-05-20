<?php
include_once 'models/usuario.php';
include_once 'librerias/user_session.php';

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->me = new Usuario();
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function testRegis()
    {
        echo $_POST['role'] . ' ' . $_POST['username'] . ' ' . $_POST['name'] . ' ' . $_POST['lastName'] . ' ' . $_POST['email'] . ' ' . $_POST['password'];
    }
    public function testIni()
    {
        echo $_POST['role_login'] . ' ' . $_POST['email_login'] . ' ' . $_POST['password_login'];
    }

    public function registrarUsuario()
    {
        $role = $_POST['role'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->model->insertar(['role' => $role, 'photo' => null, 'pType' => null, 'username' => $username, 'name' => $name, 'lastName' => $lastName, 'email' => $email, 'password' => $password])) {
            $mensaje = 1;
        } else {
            $mensaje = 0;
        }

        echo $mensaje;
    }

    public function inicioSesion()
    {
        $userSession = new UserSession();
        $mensaje = 0;
        $role = $_POST['role_login'];
        $email = $_POST['email_login'];
        $password = $_POST['password_login'];

        if ($this->model->userExist(['role_user' => $role, 'email' => $email, 'password_user' => $password])) {
            $this->view->me = $this->model->setUser($email);
            $userSession->setCurrentUser($this->view->me);
        } else {
            $mensaje = -1;
        }
        echo $mensaje;
    }

}
