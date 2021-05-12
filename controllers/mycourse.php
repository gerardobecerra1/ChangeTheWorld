<?php
class Mycourse extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('mycourse/index');
    }

}