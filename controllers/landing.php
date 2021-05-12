<?php
class Landing extends Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    function render()
    {
        $this->view->render('landing/index');
    }

    function saludo()
    {
        echo '<p>Ejecutaste el método Saludo</p>';
    }

}
