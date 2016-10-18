<?php

/**
 * This class is the base controller which all controller are children, or granchildren
 * 
 * @class Controller
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Controller 
{
    /** 
     * @var View This is to hold a instance of View which is the base for all views
     * @access public 
     */ 
    public $view;
    
    /** 
     * @var Model $model This is to hold a instance of the Model not base Model nut the name passed on the __construct
     * @access protected 
     */
    protected $model;

    /**
     * @description This __construct initialaze the session and instantiate the View object and also loads the model 
     * so the Controller will have a view and a model property
     * @param string|boolean $modelName_ The sefault is boolean if nothing passed in, 
     * but if string passed in in, it will be to as the model name to initialize the model for this Controller
     * @access public
     * @see Session::init(), Controller::loadModel()
     */
    public function __construct( $modelName_=false ) 
    {
        Session::init();
        $this->view = new View();
        if ( $modelName_ !== false )
        {
            $this->_loadModel( $modelName_ );
        }
    }
    
    /**
     * @param string $name The class name, because the Model has the same name as the Controller 
     * adding "Model_" before the name means the exact model name
     * @access private
     */
    private function _loadModel( $name ) 
    {
        $modelName = ucfirst( strtolower( $name ) ) . '_Model';
        $modelPath = 'models/' . strtolower( $name ) . '_model.php'; 
        
        if ( file_exists( $modelPath ) )
        {
            require $modelPath;
            /**
             *  @var {$modelName} $model 
             */
            $this->model = new $modelName();
        }
        else
        {
            $this->model = new Model;
            if( Session::isLocal() )
            {
                echo "<h1>The Model did not load name pass in:  " . $modelName . "</h1>";
            }
        }
    }
    
    /**
     * @description This method returns the numbers of params needed for this passed in method
     * @param string $function The function name to check if it need params
     * @return integer The number of parameters that needed
     * @access public
     */
    public function return_number_params( $function ) 
    {
        $reflection = new ReflectionMethod( get_class( $this ), $function );
        return $reflection->getNumberOfParameters();
    }
    
    /**
     * @description The boolean the check if need, or not params
     * @param string $function The function name to check if it need params
     * @return boolean If true need params, if false not needed
     * @access public
     * @see Controller::return_number_params()
     */
    public function need_params( $function ) 
    {
        return ( $this->return_number_params( $function ) > 0 ) ? true : false;
    }
    
    /**
     * @description If the $data is false call the error Controller
     * @param mixed $data The result form the ErrorHandler->errorReturn(), or Model->modelReturn()
     * @see Error
     * @access public
     */
    public function hasError( $data ) 
    {
        if ( !$data['result'] )
        {
            require_once CONTROL . 'error.php';
            $error = new Error();
            $error->Index( $data['msg'] );
            exit;
        }
    }
}