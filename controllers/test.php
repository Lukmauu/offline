<?php

/**
 * 
 * @description This is the main Test Coantroller, with only a test purpose
 * @class Test
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 07/01/2014
 * @access public
 * @extends Controller
 */
class Test extends Controller
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
     * @description The main method of Test Controller to preper and display those message with error to the View
     * @access public
     */
    public function Index() 
    {
        $this->view->render('test/demo');
    }
}

