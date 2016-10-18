<?php

class Input {
    
    
    private static function _arrayToObject($array, $keyNotToLowercase=false) {
        if (!$array) {return false;}
       
        $object = new stdClass();
        
        foreach ($array as $key => $value) {
            $key_ = $keyNotToLowercase === false ? strtolower($key) : $key;
            
            $object->{$key_} = is_array($value) ? $this->_arrayToObject($value) : stripslashes(strip_tags(trim($value))); 
        }
        
        return $object;
    }
    
    public static function get() {
        return self::_arrayToObject(filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING));
    }
    
    public static function post() {
        return self::_arrayToObject(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
    }
    
    public static function isGet() {
        return (self::server()->request_method === 'GET');
    }
        
    public static function isPost() {
        return (self::server()->request_method === 'POST');
    }
    public static function isPut()
    {
        return (self::server()->request_method === 'PUT');
    }
    
    public static function isDelete()
    {
        return (self::server()->request_method === 'DELETE');
    }
    
    public static function isAsync() 
    {
        $server_ = self::server();
        
        return (!empty($server_->http_x_requested_with) && 
                 strtolower($server_->http_x_requested_with) === 'xmlhttprequest');
    }
        
    public static function server() {
        return self::_arrayToObject(filter_input_array(INPUT_SERVER));
    }
    
    public static function cookie() {
        return self::_arrayToObject(filter_input_array(INPUT_COOKIE));
    }
    
    public static function session() {
        return self::_arrayToObject(filter_input_array(INPUT_SESSION));
    }
}
