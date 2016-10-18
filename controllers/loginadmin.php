<?php

/**
 * Needed to require Login Controller here, so this class could inherit all the goods from that Controller
 */
require_once CONTROL . 'login.php';

/**
 * 
 * @description This is the Controller to help with with LoginAdmin, but this class extends The Login Controller
 * @class LoginAdmin
 * @extends Login
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 * @see Login
 */
class LoginAdmin extends Login 
{
    /**
     * 
     * Always __construct the parent::
     * 
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->redirect = 'admin';
        $this->view->role = 'admin';
        $this->view->loginAction = 'loginadmin';
    }
}