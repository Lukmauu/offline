<?php

/**
 * 
 * This is the Controller to help with search
 * 
 * @class Register
 * @extends Controller
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Register extends Controller
{
    /**
     * IMPORTANT pass $this class name to the parent __construct so 
     * then the Controller that need a custom model
     * 
     * which all the times will have the same name of the class follow 
     * by "_Model" can load its model on the Controller base class  
     * 
     * Always __construct the parent::
     * 
     * @access public
     */
    public function __construct()
    {
        parent::__construct( get_class( $this ) );
    }
    
    /**
     * @descrition The defailt method for this Controller
     * @access public
     */
    public function Index() 
    {
        $this->view->render('register/index');
    }
    
    /**
     * @description This method creates the user if does not exist in the database 
     * and if pass all the validation requirements
     * @access public
     * @see Register_Model::makeUser(), Toolbox::jsonReturn()
     */
    public function makeUser() 
    {
        $data = $this->model->makeUser();
        $this->model->jsonReturn( $data['result'], $data['msg'] );
    }
}