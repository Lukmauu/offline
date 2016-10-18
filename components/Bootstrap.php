<?php

/**
 * 
 * This is the main Class of this mvc project
 * 
 * @description Bootstrap as the name sugests start the aplication, checks if the URL passed in and is validade then loads the needed Controllers and Actions 
 * @class Bootstrap
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Bootstrap 
{
    /** 
     * @var string|Controller This will hold the Controller 
     * @access private
     */
    private $urlController;

    /** 
     * @var string $urlAction The method (of the above Controller), often also named "Action" 
     * @access private
     */
    private $urlAction;

    /**
     * @var string Parameter one (It will be load if something pass in)
     * @access private
     */
    private $urlParameter_1;

    /** 
     * @var string Parameter two (It will be load if something pass in)
     * @access private
     */
    private $urlParameter_2;

    /** 
     * @var string Parameter three (It will be load if something pass in)
     * @access private
     */
    private $urlParameter_3;
    
    /** 
     * @var mixed To hold the rest of the url to pass on action 
     * @access private
     */
    private $_afterUrlAction;

    /** 
     * @var string To store the raw url 
     * @access private
     */
    private $_storeURL;

    /**
     * @description Only call the $this->_splitUrl() the rest will be set at $this->Init()
     * @see _splitUrl()
     * @access public
     */
    public function __construct() 
    {
        /**
         * Grab the url and params, and put in there places
         */
        $this->_splitUrl();
    }
 
    /**
     * 
     * @Description This method is just a door to any future changes, so you could add options before initilize, however for now it just initialize
     * @return void 
     * @access public
     * @see _bootstrap() 
     */
    public function Init() 
    {  
        /**
         * Main method that create the application based on the url, that _splitUrl() just serialize
         */
        $this->_bootstrap();
    }
    
    /**
     * @return void
     * @Description Does separation of the url chopping that on the slashes and filling the var of this Bootstrap object
     * @access private
     * @see _grabUrl(), _loadAfterUrlAction
     */
    private function _splitUrl()
    {
        $url = $this->_grabUrl();
        $this->_storeURL = $url;
              
        $this->urlController    = ( isset( $url[0] ) ? $url[0] : null );
        $this->modelName        = ( isset( $url[0] ) ? $url[0] : null );
        $this->urlAction        = ( isset( $url[1] ) ? $url[1] : null );
        $this->urlParameter_1   = ( isset( $url[2] ) ? $url[2] : null );
        $this->urlParameter_2   = ( isset( $url[3] ) ? $url[3] : null );
        $this->urlParameter_3   = ( isset( $url[4] ) ? $url[4] : null );
        $this->_afterUrlAction  = ( isset( $url[2] ) ? $this->_loadAfterUrlAction() : null ); 
        
        // FOR DEBUGGING UNCOMMET THIS IF YOU HAVE PROBLEMS WITH THE URL
        // echo 'Controller: ' . $this->urlController . '<br />';
        // echo 'Action: ' . $this->urlAction . '<br />';
        // echo 'Parameter 1: ' . $this->urlParameter_1 . '<br />';
        // echo 'Parameter 2: ' . $this->urlParameter_2 . '<br />';
        // echo 'Parameter 3: ' . $this->urlParameter_3 . '<br />';
        // exit;
    }
    
    /**
     * 
     * @return mixed|null It will be null if did not work, or it will return a array with the elements from URL, and also this sanitize the url 
     * @access private
     */
    private function _grabUrl() 
    {
        $firstStage = filter_has_var( INPUT_GET, 'url' ) ? 
                        filter_input( INPUT_GET, 'url', FILTER_SANITIZE_URL ) : 
                        false;
        
        if ( $firstStage ) 
        {
            // Trim the right slashes
            $secondStage = rtrim( $firstStage, '/' );
           
            // Create a array from url on slashes
            return explode('/', $secondStage);
        }
        else
        {
            return null;
        }
    }
    
    
    /**
     * @description This is the main on this class, it will check if the file exist then require and instantiate the Controller
     * , and if there is a action check if that method exist inside that Controller, and if does not all the rest of the URL will be 
     * consider params
     * @access private
     * @see _callExistingMethod(), _callDefaultMethod(), _loadDefaultController() 
     */
    private function _bootstrap() 
    {
        // check if Controller does such a controller exist 
        if ( file_exists(  CONTROL . $this->urlController . '.php' ) ) 
        {
            // if so, then load this file and instantiate this controller
            // example: if controller would be "car", then this line would translate into: $this->urlController = new car();
            require  CONTROL . $this->urlController . '.php';
            // Instantiate passing the model name
            $this->urlController = new $this->urlController($this->modelName);
            
            // check for method: does such a method exist in the controller ?
            if ( method_exists( $this->urlController, $this->urlAction ) ) 
            {
                // Call all method that needed
                $this->_callExistingMethod();
            } 
            else 
            {   
                // Call its index method
                $this->_callDefaultMethod();
            }
        } 
        else 
        {
            // Call the Home controller
            $this->_loadDefaultController();
        }
    }
    
    /**
     * @description This method checks if the method exist inside of the given Controller, and if does call it and pass the params if has, and if not loads the the
     * default method on the Controller which always will be Index. This also will use the _isActionRedirect() method if the action is "redirect", a especial case
     * @return boolean|void It will return a boolean false after call any method just to stop inside execution, and void for the rest
     * @see _isActionRedirect()
     * @access private
     */
    private function _callExistingMethod() 
    {
        if ( $this->urlAction === "redirect" )
        {
            $this->_isActionRedirect();
            return false;
        }
        
        // call the method and pass the arguments to it
        if ( isset( $this->urlParameter_3 ) )  
        {
            // will translate to something like $this->home->method($param_1, $param_2, $param_3);
            $this->urlController->{$this->urlAction}($this->urlParameter_1, $this->urlParameter_2, $this->urlParameter_3);
        } 
        elseif ( isset( $this->urlParameter_2 ) ) 
        {
            // will translate to something like $this->home->method($param_1, $param_2);
            $this->urlController->{$this->urlAction}($this->urlParameter_1, $this->urlParameter_2);
        } 
        elseif ( isset( $this->urlParameter_1 ) ) 
        {
            // will translate to something like $this->home->method($param_1);
            $this->urlController->{$this->urlAction}($this->urlParameter_1);
        }
        else 
        {
            // if no parameters given, just call the method without parameters, like $this->home->method();
            $this->urlController->{$this->urlAction}();
        }
    }
    
    /**
     * @description This method will call the default method of the Controller, and depending if it needs params and how it needs
     * @access private
     * @see Controller::return_number_params()
     * @return void
     */
    private function _callDefaultMethod() 
    {
        // If does not exist check of needs params on the index
        $param = $this->urlController->return_number_params("Index");
        
        // depending on params needed pass those
        switch ( $param ) {
            case 1:
                $this->urlController->Index(
                    $this->urlAction);
                break;
            case 2:
                $this->urlController->Index(
                    $this->urlAction, $this->urlParameter_1);
                break;
            case 3:
                $this->urlController->Index(
                    $this->urlAction, $this->urlParameter_1, $this->urlParameter_2);
                break;
            case 4:
                $this->urlController->Index(
                    $this->urlAction, $this->urlParameter_1, $this->urlParameter_2, $this->urlParameter_3);
                break;
            default:
                // If none those above call Index anyway
                $this->urlController->Index();
                break;
        }  
    }
    
    /**
     * @description This method require a file and instantiate a the default Controller "Home", and call its default method "Index"
     * @return void
     * @access private
     */
    private function _loadDefaultController() 
    {
        require CONTROL . 'home.php';
        $this->urlController = new Home();
        $this->urlController->Index();
    }
    
    /**
     * @description This method will provade value to _afterUrlAction variable, so being a reference of all parameters passed in 
     * @return array The array with the value of the URL except Controller and Action (first index and second index on URL array),
     * so it will all parameters if any passed in
     * @access private
     */
    private function _loadAfterUrlAction() 
    {
        $arraySize = count( $this->_storeURL );
        
        $urlString = array();
        for ( $i = 2; $i < $arraySize; $i++ )
        {
            if ( isset( $this->_storeURL[$i] ) )
            {
                array_push( $urlString, $this->_storeURL[$i] );
            }
        }

        return $urlString;
    }
    /**
     * @description This method will be called in especial cases when passed in a Controller login with a action redirect
     * @see Login::Redirect()
     * @access private
     */
    private function _isActionRedirect() 
    {
        $this->urlController->{$this->urlAction}($this->_afterUrlAction);
    }
}
