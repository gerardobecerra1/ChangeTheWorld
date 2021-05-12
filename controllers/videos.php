<?php
class Videos extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('videos/index');
    }

}