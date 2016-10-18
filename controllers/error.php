<?php

/**
 * 
 * @description This is the main Controller on the application it will be call by 
 * default if nothing passed on the URL
 * @class Error
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 * @extends Controller
 */
class Error extends Controller
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
    }
    
    /**
     * 
     * @param string||mixed $url The value of the error to display
     * @description The mein method of Error Controller to preper and display those message with error
     * @access public
     */
    public function Index( $url=false ) 
    {
        $url = is_array( $url ) ? implode( ' ', $url ) : $url;
        $this->view->msg = $url ? $url : 'This page does not exist';
        $this->view->render('error/index');
    }
}