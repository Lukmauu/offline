<?php

/**
 * 
 * This is the Controller to help with search
 * 
 * @class Login
 * @extends Controller
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Login extends Controller
{
    /**
     * IMPORTANT pass $this class name to the parent __construct so then the Controller that need a custom model
     * which all the times will have the same name of the class follow by "_Model" can load its model on the Controller base class 
     * 
     * Always __construct the parent::
     * 
     * @access public
     */ 
    public function __construct() 
    {
        parent::__construct( get_class( $this ) );
        $this->view->redirect = "";
    }
    
    /**
     * @description The method default to be call inside this Controller
     * @access public
     */
    public function Index()
    {
        $this->view->render('login/index');
    }
    
    /**
     * WARNING This method in intendt to use on a AJAX environment
     * 
     * @description This method will select the row in the database and verify if the password in the database 
     * match with the password passed form the user and return the a JSON with the "result" and a "msg"
     * @see Login_Model::Run()
     * @access public
     */
    public function Run() 
    {
        $data = $this->model->run();
        $this->model->jsonReturn($data['result'], $data['msg']);
    }
    
    /**
     * 
     * @param boolean||array $redirect The default is a boolean false, and could be pass a array 
     * with the values will be strings pointing to where should redirect
     * @description This is a especial action to redirect to after login
     * @access public
     */
    public function Redirect( $redirect=false )
    {
        $_urlString = false;
        if ( $redirect )
        {
            foreach ( $redirect as $value ) 
            {
                $_urlString .= '/' . $value;
            }   
        }
        
        $this->view->redirect = $_urlString;
        $this->view->render('login/index');
    }
}
