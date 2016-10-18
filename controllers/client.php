<?php

class Client extends Controller
{

    public function __construct()
    {
        exit('here');
    }
    
    public function create()
    {
        $this->view->render('client/create');
    }
}