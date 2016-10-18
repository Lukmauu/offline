<?php

// Needed to require Dashboard Controller here, so this class could inherit all the goods from that Controller
require_once CONTROL . 'dashboard.php';

/**
 * 
 * @description This Controller is for main Admin and get some functionality
 * @class Admin
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 * @extends Dashboard
 */
class Admin extends Dashboard
{
    /**
     * IMPORTANT pass $this class name to the parent __construct so then the Controller that need a custom model
     * 
     * which all the times will have the same name of the class follow by "_Model" can load its model on the Controller base class  
     * 
     * Always __construct the parent::
     * 
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->role = 'admin';
    }
    
    /**
     * 
     * @param string||array $url The value of the error to display
     * @description The main method of Admin Controller to preper and display those message with error
     * @access public
     */
    public function Index() 
    {
        $data = $this->model->getAllUser();
        
        $this->hasError( $data );
        
        $this->view->users = $data['result'];
        
        $this->view->render('admin/index');
    }
    
    /**
     * 
     * @description Check if property "loggedIn" is set on the $_SESSION object, 
     * and also if the role is admin, if not destroy, and redirect to login/redirect 
     * passing the $this->requestUri
     * @access private
     * @see Session::destroy()
     */
    private function checkLoggedIn() 
    {
        $logged = Session::get('loggedIn');
        $role = Session::get('Role');
        if ( !$logged && $role !== 'admin' )
        {
            Session::destroy( BASE_PATH . "login/redirect" . $this->requestUri );
        }
    }
}