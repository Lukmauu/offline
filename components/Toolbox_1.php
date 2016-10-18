<?php

/**
 * Require this library to help on password hashing
 */
require_once 'phpPasswordHashingLib-master/phpPasswordHashingLib-master/passwordLib.php';

/**
 * 
 * This class has some static method and some that you need to instantiate the class to have access, in general are some method to help the Views, Models, and Controllers 
 * 
 * @class Toolbox
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Toolbox 
{   
    /**
     * @decription This is just a empty __construct
     * @access public  
     */
    public function __construct() 
    {
    
    }
    
    
    /**
     * 
     * @param string $type some constante like INPUT_POST, INPUT_GET, etc
     * @param array $hasKey A single dimension array with the values or keys to be check optional 
     * @param boolean $key_ default false check for values on the array of value if true will check the keys passed at second arg
     * @return array|boolean The value of the POST or a boolean false if something went wrong
     * @see Toolbox::sanitizePost(), Toolbox::checkValue(), Toolbox::_sanitizeHelper
     * @access public
     */
    public static function sanitize( $type, $hasKey=false, $key_=false )
    {
        // INPUT_GET INPUT_POST
        $pre_post = filter_input_array( $type, FILTER_SANITIZE_STRING );
        // Return false if call without a post request
        if ( !$pre_post || is_null( $pre_post ) ) { return false; }
        
        $post = self::sanitizePost( $pre_post );
        
        if ( $post && !$hasKey )
        {
            return $post;
        }
        else
        {
            $count = count($hasKey);
            foreach ( $hasKey as $key => $value )
            {
                self::checkValue( $value );
                if ( self::_sanitizeHelper( $post, $value, $key_ ) ) 
                {
                    $count--;
                }
            }
            return $count === 0 ? $post : false;
        }
    }
    
    /**
     * 
     * @param array $array The array with the data to be check
     * @param string $element A element of the key array passed on sanitize function
     * @param boolean $key_ If true check for key on array, and if false check for certain values on the array
     * @return boolean
     * @see private
     * @description This is a static method only intend to use inside Toolbox class 
     * @access private
     */
    private static function _sanitizeHelper( $array, $element, $key_=false )
    {
        if ( !is_array( $array ) )
        {
            return $array;
        }
        
        foreach ( $array as $key => $value ) 
        {
            $_internalValue = ( $key_ ) ? $key : $value;
           
            if ( $_internalValue === $element )
            {
                return true;
            }
        }
        return false;
    }
    
    /**
     * 
     * @param array $post Result that come from $_POST or $_GET
     * @return array Returns the same array with sanitize data
     * @see Toolbox::sanitizeString()
     * @description To sanitize a array and return it
     * @access public
     */
    public static function sanitizePost ( $post ) 
    {
        if ( !is_array( $post ) ) 
        {
            return self::sanitizeString( $post );
        }
    
        foreach ( $post as $key => $value ) 
        {
            if ( is_array( $value ) )
            {
                $post[$key] = self::sanitizePost( $value );
            }
            else
            {
                $post[$key] = self::sanitizeString( $value );
            }
        }
        return $post;
    }
    
    /**
     * 
     * @param string $value Any given string to be check
     * @param integer $length The minimun length that given string should have, the default for this is 3
     * @return boolean The result if the string match all the requires
     * @description This is a static method checks if the string is empty, and if is null, and if the length is greater then length param
     * @access public
     */
    public static function checkValue( $value, $length=3 ) 
    {
        $value = trim( $value );
        return !empty( $value ) && strlen( $value ) > $length && !is_null( $value );
    }
    
    /**
     * 
     * @param mixed $string The array that comes from the Database
     * @return mixed The array ready for dsplay
     * @see Toolbox::desanitizeString()
     * @access public
     */
    public static function desanitizePost( $string ) 
    {
        if ( !is_array( $string ) ) 
        {
            return self::desanitizeString( $string );
        }
    
        foreach ( $string as $key => $value ) 
        {
            if ( is_array( $value ) )
            {
                $string[$key] = self::desanitizePost( $value );
            }
            else
            {
                $string[$key] = self::desanitizeString( $value );
            }
        }
        return $string;
    }
    
    /**
     * 
     * @param string $var The value to be sanitize
     * @return string The string after sanitized
     * @access public
     */
    public static function sanitizeString( $var ) 
    {
        return stripslashes( strip_tags( trim( $var ) ) );
    }
    
    /**
     * 
     * @param string $var The string that comes from Database
     * @return string The string ready to display
     * @access public
     */
    public static function desanitizeString ( $var ) 
    {
        return stripcslashes( htmlentities( $var ) );
    }
    
    /**
     * 
     * @param INPUT_SERVER $server System string INPUT_SERVER that access the $_SERVER var with filter
     * @return boolean If the request was made using AJAX
     * @description Checks the request array if there is a xmlhttprequest
     * @access public
     */
    public function checkAjax() 
    {
        $server = Session::getServer();
        
        return ( !empty( $server['HTTP_X_REQUESTED_WITH'] ) && 
                 strtolower( $server['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest' );
    }
   
    /**
     * 
     * @param mixed $array The array to turn into a JSON object
     * @param boolean $exit The default is true which means that after echo the JSON the script will stop running immediately, and you pass false it will continue running
     * @descrition To help return JSON object
     * @access public
     */
    public function jsonEcho( $array, $exit=true ) 
    {
        if ( !is_array( $array ) )
        {
            echo json_encode( false );exit;
        }
        
        if ( $exit )
        {
            echo json_encode( $array );exit;
        }
        else 
        {
            echo json_encode( $array );
        }
    }
    
    /**
     * 
     * @param any $result The reuslt to return could be any system type
     * @param (boolean||string) $msg The default for this is false, but you pass a string in to display back to the user  
     * @param boolean $exit The default is true which means that after echo the JSON the script will stop running immediately, and you pass false it will continue running
     * @description This method echo a JSON back to the user
     * @access public
     */
    public function jsonReturn( $result, $msg=false, $exit=true ) 
    {
        if ( !$msg )
        {
            $this->jsonEcho( array( 'result' => $result['result'], 'msg' => $result['msg'] ), $exit );
        }   
        else
        {
            $this->jsonEcho( array( 'result' => $result, 'msg' => $msg ), $exit );
        }
    }
    
    /**
     * 
     * @param string $pass The password that you want hash
     * @return string The hashed password
     * @description This method make the hash with a string
     * @access public
     * @internal This should be protected, I need a better class design in future
     */
    public function _hash_password ( $pass )
    {
        $options = array( 'cost' => 11 );

        return password_hash( $pass , PASSWORD_BCRYPT, $options);
    }
    
    /**
     * 
     * @param string $toVerify The password typed in to be check
     * @param array $result The result that comes back from the Database, this data will fill the session array
     * @return boolean True if the password match and false if not
     * @description This check of the password matchs, if does init the session add the result that comes from Database to the session array, set true in the loggedIn in the session array, and return true, otherwise just return false
     * @access public
     */
    public function _password_verify_hash( $toVerify, $result )
    {
    
        if ( password_verify( $toVerify, trim( $result['Password'] ) ) )
        {
            unset( $result['Password'] );
            Session::init();
            Session::set( $result );
            Session::set( array('loggedIn' => true) );
            return true;
        }
        else
        {
             return false;
        }
    }
    
    /**
     * 
     * @param array|string $thing Could be a array or string to display
     * @param boolean $flag The default is false then if will exit after echo, and if set true will continue running the script
     * @descriptiom This method is intended to be use as debug helper, only internally
     * @access public  
     */
    public function echoPre ( $thing, $flag=false ) {
    
        if ( is_array( $thing ) ) {

            if ( !$flag ) {

                echo '<pre>'; print_r( $thing ); echo '</pre>'; exit;
            } else {

                echo '<pre>'; print_r( $thing ); echo '</pre>';
            }
        } else {

            if ( !$flag ) {

                echo '<h1>' . $thing . '</h1>'; exit;
            } else {
                echo '<h1>' . $thing . '</h1>';
            }
        }
    }
    
    /**
     * 
     * @param string $date The Date comes from the Database 
     * @return string The string back in a well humam readiable 
     * @description This is to break the date that comes from database then return to the user
     * @access public
     */
    public function break_date( $date )
    {
        $date = explode( '-', str_replace( '/', '-', $date ) ); 
        return $date[1].'-'.$date[2].'-'.$date[0];
    }
    
    /**
     * 
     * @param string $date The value that comes from the database
     * @return string The string with the date in a human read format
     * @access public
     */
    public function fix_date( $date )
    {
        $date = explode('-',str_replace('/','-',$date)); 
        return $date[1].'-'.$date[2].'-'.$date[0];
    }
    
    /**
     * @param string $name The string to take off
     * @return string The same value passed in without the underscores
     * @access public
     */
    public function underscoreOut( $name ) 
    {
        return str_replace('_', ' ', $name);
    }
    
    /**
     * @param string $name ( The string to add underscores on white spaces )
     * @return string ( The string with underscores )
     */
    public function underscoreIn( $name ) 
    {
        return str_replace(' ', '_', $name);
    }
    
    /**
     * 
     * ATTENTION INTENDED TO BE USE INSIDE VIEW
     * 
     * @param string $string The string from the Database tobe chopped to proper display
     * @return array The lines of strings, with each inside a array
     * @access public
     */
    public function choppeStringInLine( $string )
    {
        if ( $this->checkValue( $string ) )
        {
            return explode( "\n", $string );
        }
        return array();
    }
    
    /**
     * 
     * @param string $string A string to delete the tabs from
     * @return string The string without tabs
     * @access public
     */
    public function cleanWhiteSpaceAndTabEach( $string ) 
    {
        return preg_replace( "/[\t]+/", " ", $string );
    }
    
    /**
     * ATTENTION This method only delete white space from both ends of the string
     * 
     * @param mixed $data The array to be clean, each element will be affected
     * @return mixed The same array passed in but withoout tabs and white space
     * @see Toolbox::cleanWhiteSpaceAndTabEach()
     * @access public
     */
    public function cleanWhiteSpaceAndTab( $data ) 
    {
        foreach ( $data as $key => $value ) 
        {
            if ( is_array( $value ) )
            {
                $data[$key] = $this->cleanWhiteSpaceAndTab( $value );
            }
            else
            {
                $data[$key] = $this->cleanWhiteSpaceAndTabEach( $data[$key] );
            }
        }
        return $data;
    }
    
    /**
     * 
     * @param mixed $recipe The many recipes that came from the Database
     * @return string As this method is set to be use inside view, this does not return just echo html on the page
     * @access public
     */
    public function displayManyRecipeDetail( $recipe ) 
    {
        $string = '<div class="container-fluid">';

        foreach ( $recipe as $key => $value ) 
        {
            $string .= '<div class="row center-block">';
            $string .= '<div class="col-sm-6 panel">';
            $string .= '<h4>' . ucwords( $this->underscoreOut( $value['RecipeName'] ) ) . '</h4>';
            $string .= '<p>Name of Submitter :&nbsp;<small>' . ucfirst( $value['SubmitterName'] ) . '</small>&nbsp;&nbsp;Cooking time :&nbsp;<small>1h</small></p>';
            $string .= '<span class="badge">' . $value['Keywords'] . '</span>';
            $string .= '</div>';
            $string .= '<div><a class="btn-lmo buttom-lmo" ';
            $string .= 'href="' . BASE_PATH . 'recipe/' . $this->underscoreIn( $value['RecipeName'] ) . '/' . $value['RecipeID'] . '">';
            $string .= 'GO TO RECIPE DETAILS</a></div>';    
            $string .= '</div>';
        }
        
        $string .= '</div>';
        echo $string;
    }
}