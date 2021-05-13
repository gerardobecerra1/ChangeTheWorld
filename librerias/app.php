<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //Cuando se ingresa sin definir controlador
        if (empty($url[0])) {
            $archivoController = 'controllers/landing.php';
            require_once $archivoController;
            $controller = new Landing();
            $controller->loadModel('landing');
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;

            //inicializa el controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //si hay un método que se rquiere cargar
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }else{
                $controller->render();
            }
        } else {
            $controller = new Errores();
        }

    }

}
