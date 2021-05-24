<?php
require 'librerias/user_session.php';
include_once 'models/usuario.php';
(new UserSession());
class Chat extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->usuarios = new Usuario();
    }

    function render()
    {
        $this->view->usuarios = $this->model->traerUsuarios();
        $this->view->render('chats/index');
    }

    function traerMensajes($param = null){
        // $this->model->traerMensajePrivado($param[0]);
        echo '<a>Cargando....</a>';
        
    }
}