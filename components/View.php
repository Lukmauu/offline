<?php

/**
 * 
 * This should be instanciate inside of base Controller, so each controller could render its view
 * 
 * @class View
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class View 
{
    /** 
     * @var Toolbox Especial variable to hold a reference to Toolbox on each View 
     * @access public
     */
    public $tool = null;
    
    /**
     * Create a instance of Toolbox class
     * @access public
     */
    public function __construct() 
    {
        $this->tool = new Toolbox();
    }
    
    /**
     * 
     * @param string $name The name of the view to be render
     * @param boolean $noInclude If set to true it is going to render withour header and footer
     * @access public
     */
    public function render( $name, $noInclude=false ) 
    {
        if ( $noInclude )
        {
            require 'views/' . $name . '.php';
        }
        else
        {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }
    
    /**
     * 
     * ATTENTION This method depends on BASE_PATH constante
     * 
     * @param string $url The url to concatenate with the BASE_PATH so it can echo a absolute path
     * @access public
     */
    public function friendlyUrl( $url ) 
    {
        echo BASE_PATH . $url;
    }
    
    /**
     * @description This method is intended to produce the login section of the header
     * @access public
     * @see Session::isOnSession()
     */
    public function createUserHtml()
    {
        if ( Session::isOnSession() ) 
        {
            echo '<li><a class="user-name__ btn btn-success navbar-btn" href="' . BASE_PATH . 'dashboard">';
            echo '<span class="glyphicon glyphicon-user">';
            echo '</span>  '. ucfirst( strtolower( Session::get( 'UserName' ) ) ) .'</a></li>';
            echo '<li><a class="btn btn-danger navbar-btn" href="' . BASE_PATH . 'dashboard/logout"><span class="glyphicon glyphicon-off"></span>  Logout</a></li>';
        } 
        else 
        {
            echo '<li><a class="btn btn-success navbar-btn" href="' . BASE_PATH . 'register"><span class="glyphicon glyphicon-ok-sign"></span>  Register</a></li>';
            
            echo '<li><a class="btn btn-primary navbar-btn" href="' . BASE_PATH . 'login"><span class="glyphicon glyphicon-log-in"></span>  Log In</a></li>';
        }
    }
    
    /**
     * 
     * @param integer||string $key The name of the key that you want to retrive the value
     * @param integer $index The index of the array if recipe is a nested array
     * @description To be use to display the recipe data in each field 
     * @access public
     * @see Toolbox::desanitizePost(), Toolbox::cleanWhiteSpaceAndTabEach()
     */
    public function displayValue( $key, $index=0)
    {
        $string = null;
        if ( $index === false )
        {
            if ( isset( $this->recipe[$key] ) )
            {
                $string = $this->recipe[$key];
            }
            else
            {
                $string = "";
            }
        }
        else
        {
            if ( isset( $this->recipe[$index][$key] ) )
            {
                $string = $this->recipe[$index][$key];
            }
            else
            {
                $string = "";
            }
        }
        echo Toolbox::desanitizePost( $this->tool->cleanWhiteSpaceAndTabEach( $string ) );
    }
}
