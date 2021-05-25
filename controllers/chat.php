<?php
require 'librerias/user_session.php';
include_once 'models/usuario.php';
include_once 'models/chatperrones.php';

(new UserSession());
class Chat extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->usuarios = new Usuario();
        $this->view->mensajes = new ChatPerrones();
    }

    function render()
    {
        $this->view->usuarios = $this->model->traerUsuarios();
        $this->view->render('chats/index');
    }

    function traerMensajes($param = null){
        $this->view->mensajes = $this->model->traerMensajePrivado($param[0],$param[1]);
        foreach ($this->view->mensajes as $row) {
            echo '<a><strong>'.$row->username.'</strong>: '.$row->_message.'</a>';
        }
    }

    function insertar($param = null){
        // echo $param[0].' '.$param[1].' '.$param[2];
        if($this->model->insertarMensaje($param[0],$param[1],$param[2])){
            echo 0;
        }
        else{
            echo -1;
        }
    }
}