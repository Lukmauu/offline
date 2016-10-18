<?php

/**
 * 
 * This is the Controller to help with search
 * 
 * @class Search
 * @extends Controller
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Search extends Controller
{
    /**
     * IMPORTANT pass $this class name to the parent __construct 
     * so then the Controller that need a custom model
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
     * @description This is the default method that will be call when the Controller loads
     * @access public
     */
    public function Index() 
    {
        $this->view->render( 'search/index' );
    }
    
    /**
     * 
     * @param integer $param The number of the page that you want to retrive from the query result
     * @see Model::getByIngredients(), Model::checkAjax(), View::render()
     * @access public
     */
    public function getByIngredients( $param=false ) 
    {
        $page = !$param ? 1 : $param;
        
        $data = $this->model->getByIngredients( $page );
        
        if ( $data['result'] !== false )
        {
            $this->view->pag = $data['result'];
            
            if ( $this->model->checkAjax( INPUT_SERVER ) )
            {
                $this->view->render('page/index', true);
            }
            else
            {
                $this->view->render('page/index');
            }
        }
        else
        {
            echo "<h1>" . $data['msg'] . "</h1>"; 
        }
    }
}
