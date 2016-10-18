<?php

/**
 * 
 * This class has a purpose to handler the errors that occurs on the application 
 * 
 * @description It has a array that after check the cases store the message inside the array for any result return a array with two elements a "result"
 * with boolean false of the data itself (that could be anything), and a string message that could one or many
 * @class ErrorHandler
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class ErrorHandler {
    
    /**
     * @var Array This a variable will hold the array of error, errors messages
     * @access protected
     */
    protected $_error = [];
    
    /**
     * This is a empty __construct 
     */
    public function __construct() {
        
    }
    
    /**
     * @return integer This return the length or the _error array
     * @access public
     */
    public function Count() {
        return count($this->_error);
    }
    
    /**
     * @description This reset the main array to a empty array, should be call all times before any method that will need check for errors
     * @access public
     */
    public function Reset() {
        $this->_error = [];
    }
    
    public function hasError() {
        return ($this->Count() > 0);
    }
    
    /**
     * @param array||string||PDOException $value To fill the {@link $_error} array with messages, or message of error
     * @description To set value on {@link $_error} array   
     */
    public function Set($value) {
        if ($value instanceof PDOException) {
            $string = $value->getMessage(); 
            if (Session::isLocal()){
                $string .= "<br />ON: " . $value->getFile() . "<br />LINE: " . $value->getLine(); 
            }
            $string .= "<br />Please try again!";
            array_push($this->_error, "<h4>" . $string . "</h4>");  
        }
        if (is_array($value)) {
            foreach ($value as $val) {
                array_push($this->_error, "<h4>" . $val . "</h4>");  
            }
        }
        else {
            array_push($this->_error, "<h4>" . $value . "</h4>");  
        }
    }
    
    /**
     * 
     * @return array
     * @description The whole {@link $_error} array with the error message
     */
    public function Get() {
        return $this->_error;
    }
    
    /**
     * @return void
     * @access public
     */
    public function printIt() {
        echo "<pre>";
        print_r($this->_error);
        echo "</pre>";
    }
    
    /**
     * @param boolean|array $result The result of anything that was check on ErrorHandler class
     * @param string $msg The message that will display for the user
     * @return array A array with two elements "result" and "msg", the result comtains a boolean if false, or the data returned
     * and the msg is just a string to display back to the user
     */
    public function baseReturn($result, $msg=false) {
        return (!$msg && is_array($result)) ? 
            ['result' => $result['result'], 'msg' => $result['msg']] : 
            ['result' => $result, 'msg' => $msg];
    }
    
    /**
     * @description The main return of all checks if there is a error message and then return if false or truem, 
     * and on true could be boolean or any system type
     * @return array More information look at {@link errorReturn()}
     * @param any $success The default is false so it is a boolean, but you could pass anything here so it will be
     * delivery back to the user on the success
     * @see baseReturn(), _errorImplode()
     * @depends baseReturn(), _errorImplode()
     */
    public function errorReturn($success=false) {
        if ($this->Count() > 0) {
            return $this->baseReturn(false, $this->_errorImplode());
        }
        else {
            return $this->baseReturn($success ? $success : true, "It was a success, thank you!");
        }
    }
    
    /**
     * @param boolean $bool Pass anything to be checked a execute statement or a fetch 
     * @param PDOStatement $stmt The statement itself
     * @param string $errorMsg A string message to go with the return, if none pass the default is the constant CHECK_OPERATION_FAIL.
     * @description To check execute or fetch works if not set value on error
     * @access public
     * @return void
     */
    public function Check($bool, $stmt, $errorMsg=CHECK_OPERATION_FAIL) {
        
        
        //var_dump($this->Get());
        //print_r($stmt);
        if (!$bool) {
            $this->Set($errorMsg . implode( " : ", $stmt->errorInfo()));
        }
    }
    
    /**
     * @return string The string made from the {@link $_error} array
     * @see Count() 
     */
    private function _errorImplode() {
        $_internalArray = $this->Get();
        
        if ($this->Count() === 1) {
            return $_internalArray[0];
        }
        else if ($this->Count() > 1) {
            foreach ($_internalArray as $key => $value) {
                $_internalArray[$key] = $value;
            }
        
            return implode("\n", $_internalArray);
        }
    }
}