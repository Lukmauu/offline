<?php
/**
 * 
 * WARNING never instantiate this class 
 * 
 * @description A static class to organize and manipulate anything relatetive with $_SESSION global
 * @class Session
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Session
{
    /**
     * 
     * @return boolean If the application is running on localhost or on the web
     * @depends filter_input
     * @access public
     */
    public static function isLocal() {
        $server_ = Input::server();
        return ($server_->server_name === '127.0.0.1' || $server_->server_name === 'localhost'); 
    }
    
    /**
     * 
     * @see Session::isLocal()
     * @descrition This method checks if the SESSION has started, and if not it start one
     */
    public static function init() {
        $sessionUrl_ = self::isLocal() ? "C:\wamp\/tmp" : "/tmp";
        session_save_path($sessionUrl_); 
        @session_start();
    }
    
    /**
     *
     * @param array $array The array with a key and value to be set on the global SESSION array\
     * @access public
     * @description Needs to pass a array or will return false 
     */
    public static function set($array) {
        if (!is_array($array)) {
            return false;
        }
        
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }
    
    /**
     * 
     * @param string $key The string passed in to search inside $_SESSION global and if is there delete
     * @return boolean Return false if the key passed in is not present at $_SESSION global
     * @description Use to delete values from $_SESSION global base on the key
     * @see Session::get()
     * @access public
     */
    public static function deleteKey( $key ) 
    {
        if ( !self::get( $key ) )
        {
            return false;
        }
        else
        {
            unset( $_SESSION[$key] );
        }
    }
    
    /**
     * 
     * @param string $key The name of the key that you wnat to retrive the value
     * @return boolean|any The could be boolean, if the value asked is not in 
     * the SESSION array, but if exist will return it, and it could be any type
     * @access public
     */
    public static function get( $key )
    {
        return isset($_SESSION[$key] ) ? $_SESSION[$key] : false;
    }
    
    /**
     * 
     * @return boolean True if the SESSION loggedIn has started, and false otherwise
     * @access public
     */
    public static function isOnSession() 
    {
        return isset( $_SESSION['UserName'] ) && isset( $_SESSION['loggedIn'] );
    }
    
    /**
     * 
     * @param string $where The url that you want the user to go after the SESSION be destroy
     * @description This method will destroy the session and erase the cookies made by that session, 
     * and redirect the user where the $where param set, by default $where is set to the root     
     * @access public
     */
    public static function destroy( $where=false )
    {
        $_SESSION = array();

        if ( session_id() !== "" || filter_input( INPUT_COOKIE, session_name() ) ) 
        {
            setcookie( session_name(), '', time() - 2592000, '/' );

            session_destroy();
        }
        if( !$where )
        {
            header("Location: /");exit;
        }
        else
        {
            header("Location: " . $where);exit;
        }
    }
    
    /**
     * 
     * @return array The super global $_SERVER
     * @access public 
     * @description It is a static method that return the super global $_SERVER
     */
    public static function getServer()
    {
        return $_SERVER;
    }
}


