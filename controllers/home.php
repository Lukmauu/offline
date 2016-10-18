<?php

/**
 * 
 * @description This is the main Controller on the application it will be call by 
 * default if nothing passed on the URL
 * @class Home
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @Update 02/28/2016
 * @access public
 * @extends Controller
 */
class Home extends Controller
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
        parent::__construct();
        //$this->view->msg = array();
        //$this->view->dataFlag = false;
        //$this->view->js = array("index/js/index.js");
    }
    
    /**
     * 
     * @description This is the default method for Home Controller, and it has a purpose to grab all the recipes and 
     * preper to display on a table
     * @depends {@link Home_Model::getData()}, {@link Home::buildRecipeList}
     * @access public
     */
    public function Index() 
    {   
        $this->view->render('index/index', false);
    }
    
    /**
     * 
     * @param integer $param The number of the pagination that you want to retrive
     * @depends {@link checkAjax()}
     * @see Home_Model::searchData(), Toolbox::checkAjax()
     * @access public 
     */
    public function searchData( $param=false )
    {
        $page = !$param ? 1 : $param;
        
        $data = $this->model->searchData( $page );
        
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
    
    /**
     * 
     * @param mixed $data The array the comes back form getData() method
     * @see Toolbox::fixDate(), Toolbox::underscoreIn()
     * @description Fill out the msg list array on the view object
     */
    public function buildRecipeList( $data )
    {
        $string = '';
        foreach ( $data as $key => $value ) 
        {
            $value['Date'] = $this->model->fix_date( $value['Date'] );
            $string .= '<tr>'
                    . '<td><a href="' . BASE_PATH . 'recipe/' . $this->model->underscoreIn( $value['RecipeName'] ) 
                    . '/' . $value['RecipeID'] . '">' 
                    . $value['RecipeName'] . '</a></td>'
                    . '<td>' . $value['SubmitterName'] . '</td>'
                    . '<td>' . '( ' . $value['Date'] . ' )' . '</td>'
                    . '<td>' . $value['Keywords'] . '</td>'
                    . '</tr>';
        }
        $this->view->msg['list'] = $string;
    }
}
