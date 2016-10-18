<?php

/**
 * 
 * @description This Controller is for main Dashboard and get some functionality
 * @class Dashboard
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 * @extends Controller
 */
class Dashboard extends Controller
{
    /** 
     * @var string $requestUri To store the address that user came from
     * @access private
     */
    private $requestUri;
    
    /**
     * IMPORTANT pass $this class name to the parent __construct so then the Controller that need a custom model
     * which all the times will have the same name of the class follow by "_Model" can load its model on the Controller base class 
     * 
     * Always __construct the parent::
     * 
     * @description The __construct check if user is log in
     * @access public
     */
    public function __construct() 
    {
        parent::__construct( get_class( $this ) );
        $this->requestUri = filter_input( INPUT_SERVER, 'REQUEST_URI' );
        $this->checkLoggedIn();
        $this->username = Session::get( 'UserName' );
    }
    
    /**
     * @description The default method that get all recipes base on the UserName
     * @see Controller::hasError(), Dashboard_Model::getRecipes() 
     * @access public
     */
    public function Index() 
    {
        $data = $this->model->getRecipes( $this->username );
 
        if ( !$data['result'] )
        {
            $this->view->recipes = $data['result'];
            $this->view->msg = $data['msg'];
        }
        else
        {
            // The result is ErrorHandler->errorReturn so you need to get "result" from 
            $this->view->recipes = $this->makeRecipeList( $data['result'] );
        }
        
        // add error msg to view   
        $this->view->render('dashboard/index');
    }
    
    /**
     * @description Set some properties to the default on the view and render the addRecipe
     * @access public
     */
    public function addRecipe() 
    {
        $this->view->errorFlag = false;
        $this->view->msg = null;
        $this->view->recipe = null;
        $this->view->action = BASE_PATH . "dashboard/xhrInsert";        
        
        $this->view->render( 'dashboard/addRecipe' );
    }
    
    /**
     * @description Check if property "loggedIn" is set on the $_SESSION object, if not destroy, 
     * and redirect to login/redirect passing the $this->requestUri
     * @see Session::get(), Session::destroy()
     * @access private
     */
    private function checkLoggedIn() 
    {
        $logged = Session::get('loggedIn');
    
        if ( !$logged )
        {
            Session::destroy( BASE_PATH . "login/redirect" . $this->requestUri );
        }
    }
    
    /**
     * @description Call the destroy session and redirect to login Controller
     * @see Session::destroy()
     * @access public
     */
    public function logout() 
    {
        Session::destroy( "../login" );
    }
    
    /**
     * 
     * WARNING This method is intend to with AJAX call
     * 
     * @description This method will get data data from the model and pass the JSON back to the AJAX call
     * @see Dashboard_Model::xhrInsert()
     */
    public function xhrInsert()
    {
        $data = $this->model->xhrInsert();
        $this->model->jsonReturn( $data['result'], $data['msg'] );
    }
    
    /**
     * 
     * @description Just render the manage page
     * @access public
     */
    public function Manage() 
    {
        $this->view->render('dashboard/manage');
    }
    
    /**
     * 
     * WARNING This method is intend to with AJAX call
     * 
     * @param integer $id The RecipeID pass in will return false if is not integer 
     * @see Dashboard_Model::deleteRecipe()
     * @access public
     */
    public function deleteRecipe( $id ) 
    {
        $data = $this->model->deleteRecipe( $id );
        $this->model->jsonReturn( $data['result'], $data['msg'] );
    }
    
    /**
     * 
     * @param integer $id The RecipeID pass in will return false if is not integer 
     * @see _getDashboardHelper(), Dashmodel_Model::editRecipe()
     * @access public
     */
    public function editRecipe( $id )
    {
        $data = $this->model->editRecipe( $id );
        $this->_getDashboardHelper( $data );
    }
    
    /**
     * 
     * @param array $data A array return form Model->modelReturn() method which includes a "result" and a "msg" key
     * @description This method checks the values of $data then pass to right messages to 
     * view object only to be use inside dashboard Controller
     * @access private
     */
    private function _getDashboardHelper( $data ) 
    {
        $this->view->errorFlag = false;
        $this->view->msg = null;
        $this->view->recipe = null;
        
        if ( $data['result'] === false )
        {
            $this->view->msg = $data['msg'];
            $this->view->errorFlag = true;
        }
        else
        {
            $this->view->recipe = $data['result'];
            $this->view->action = BASE_PATH . "dashboard/xhrUpdate/" . $this->view->recipe['RecipeID'];
        }
        
        $this->view->render('dashboard/addRecipe');
    }
    
    /**
     * 
     * @param integer $id The RecipeID pass in will return false if is not integer 
     * @see Dashboard_Model::xhrUpdate()
     * @access public
     */
    public function xhrUpdate( $id ) 
    {
        $data = $this->model->xhrUpdate( $id );
        $this->model->jsonReturn( $data['result'], $data['msg'] );
    }
    
    /**
     * 
     * @param array $recipeArray The with recipes that user has on the database
     * @return string The strin gready to display as a list of recipes that the user has on the database
     * @access protected
     */
    protected function makeRecipeList( $recipeArray )
    {
        $string = '';
        if ( isset( $recipeArray[0] ) )
        {
            foreach ( $recipeArray as $key => $value )
            {
                
    $string .= '<div class="container-fluid">'
            . '<div class="row center-block">'
            . '<div class="col-xs-6 panel">'
            . '<h4>' . $value['RecipeName'] . '</h4>'
            . '<p>Name of Submitter :&nbsp;<small>' . $value['SubmitterName'] . '</small>&nbsp;&nbsp;Cooking time :&nbsp;<small>'.$value['CookTime'].'</small></p>';
    
    $string .= ( $value['Keywords'] ) ? '<span class="badge">' . $value['Keywords'] . '</span>' : '';
    
    $string .= '</div>'
            . '<div class="col-xs-3">'
            . '<ul class="list-inline">'
            . '<li class="list-group-item-text"><a class="edit_dashboard btn-lmo buttom-lmo" href="dashboard/editRecipe/' . $value['RecipeID'] . '" rel="' . $value['RecipeID'] . '">EDIT</a></li>'
            . '<li class="list-group-item-text"><a class="delete_dashboard btn-lmo buttom-lmo" href="dashboard/deleteRecipe/' . $value['RecipeID'] . '" rel="' . $value['RecipeID'] . '">DELETE</a></li>'
            . '</ul>'
            . '</div>'
            . '</div>'
            . '</div>';
        
            }
        }
        else
        {
            $value = $recipeArray;
            
    $string .= '<div class="container-fluid">'
        . '<div class="row center-block">'
        . '<div class="col-xs-6 panel">'
        . '<h4>' . $value['RecipeName'] . '</h4>'
        . '<p>Name of Submitter :&nbsp;<small>' . $value['SubmitterName'] . '</small>&nbsp;&nbsp;Cooking time :&nbsp;<small>1h</small></p>';
        
    $string .= ( $value['Keywords'] ) ? '<span class="badge">' . $value['Keywords'] . '</span>' : '';
        
    $string .= '</div>'
        . '<div class="col-xs-3">'
        . '<ul class="list-inline">'
        . '<li class="list-group-item-text"><a class="edit_dashboard btn-lmo buttom-lmo" href="dashboard/editRecipe/' . $value['RecipeID'] . '" rel="' . $value['RecipeID'] . '">EDIT</a></li>'
        . '<li class="list-group-item-text"><a class="delete_dashboard btn-lmo buttom-lmo" href="dashboard/deleteRecipe/' . $value['RecipeID'] . '" rel="' . $value['RecipeID'] . '">DELETE</a></li>'
        . '</ul>'
        . '</div>'
        . '</div>'
        . '</div>';
            
        }
        
        return $string;
    }
}