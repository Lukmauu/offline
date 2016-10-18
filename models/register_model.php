<?php

/**
 * 
 * @description This is a especificy model with extends Model class, to help Recipe Controller
 * @class Register_Model
 * @extends Model 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Register_Model extends Model
{
    /** 
     * @var array The variable that will hold the $_POST array 
     * @access private
     */
    private $_post;
    
    /** 
     * @var string This variable will hold the email comes form the database 
     * @access private
     */
    private $_email;
    
    /**
     * 
     * Always __construct the parent::
     * 
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 
     * @internal Only for test purpose
     * @access public
     */
    public function returnFakeUSer() 
    {
        return array( "FirstName" => "Lucas", 
                 "LastName" => "Oliveira",
                 "UserName" => "lukmauu",
                 "Email" => "lukmauu@hotmail.com",
                 "Password" => "lmo",
                 "Role" => "member" ); 
    }
    
    /**
     * 
     * @return array The general array modelReturn
     * @description This method creates the user if does not exist in the database and if pass all the validation requirements
     * @see _makeUserHelper(), Model::modelReturn(), ErrorHandler::errorReturn(), _emailTaken(), ErrorHandler::Count(), Database::Insert()
     * @access public
     */
    public function makeUser() 
    {
        $errorMsg = "The insertion did not work, thank you!";
        
        $this->_makeUserHelper();
        
        if ( !$this->_post )
        { return $this->db->error->errorReturn(); }
        
        else if ( $this->_userTaken() )
        { return $this->modelReturn( false, "The User Name is already taken, please enter another!" ); }
        
        else if ( $this->_emailTaken() )
        { return $this->modelReturn( false, "This Email is already in our database, please use another!" ); }
        
        // Default
        $this->_post['Role'] = ( isset( $this->_post['Role'] ) ) ? $this->_post['Role'] : "member";
        
        $this->db->error->Reset();
        
        return $this->db->Insert( $this->_makeUserQ(), $this->_post, $errorMsg );
    }
    
    /**
     * 
     * @description This method set the _post on this class so it can be use later, 
     * and set false if the $_POST went wrong
     * @see Toolbox::sanitize(), checkAll()
     * @access private
     */
    private function _makeUserHelper() 
    {
        $makeSure = array("FirstName", "LastName", "UserName", "Email", "Password");
        $post = Toolbox::sanitize( INPUT_POST, $makeSure, true );
        
        $this->db->error->Reset();
        if ( !$post )
        {
            $this->_post = false;
            $this->db->error->Set( "Invalide data passed in, please try again" );
        }
        else
        {
            $this->_post = $post;
            $this->checkAll();
        }
    }
    
    /**
     * 
     * @return string The string needed for query the database to select the user data
     * @access private
     */
    private function _makeUserQ() 
    {
        return "INSERT INTO login ( FirstName, LastName, Email, UserName,"
               ." Password, Role ) VALUES ( :FirstName, :LastName,"
               ." :Email, :UserName, :Password, :Role )";
    }
    
    /**
     * 
     * @return boolean The result from the comparison between two string 
     * @access private
     * @see _getUser()
     */
    private function _userTaken() 
    {
        $data = $this->db->Select( "Select UserName, Email FROM login WHERE UserName=:UserName", array(':UserName' => $this->_post['UserName']) );
       
        if ( $data['result'] !== false )
        {
            if ( strtolower( $this->_post['UserName'] ) === strtolower( $data['result']['UserName'] ) )
            {
                return true;
            }   
        }
        return false;
    }
    
    /**
     * 
     * @return boolean The result from the comparison between two string 
     * @access private
     */
    private function _emailTaken() 
    {
        $data = $this->db->Select( "Select Email FROM login WHERE Email=:Email", array(':Email' => $this->_post['Email']) );
        
        if ( $data['result'] !== false )
        {
            if ( strcasecmp( strtolower( $this->_post['Email'] ), strtolower( $data['result']['Email'] ) ) === 0 )
            {
                return true;
            }   
        }
        return false;
    }
    
    /**
     * @description Method to call all check method in on place
     * @see checkPassword(), checkEmail(), checkFirstAndLastName()
     * @access public
     */
    public function checkAll() 
    {
        $this->checkPassword();
        $this->checkEmail();
        $this->checkFirstAndLastName();
    }
    
    /**
     * @description This method check if the first and last are compose only by letters 
     * @see checkLetters(), ErrorHandler::Set()
     * @access public
     */
    public function checkFirstAndLastName() 
    {
        $this->_post['FirstName'] = strtolower( $this->_post['FirstName'] );
        $this->_post['LastName'] = strtolower( $this->_post['LastName'] );
        
        if ( !$this->checkLetters( $this->_post['FirstName'] ) )
        {
            $this->db->error->Set( "The first name must be only letters" );
        }
        if ( !$this->checkLetters( $this->_post['LastName'] ) )
        {
            $this->db->error->Set( "The last name must be only letters" );
        }
    }
    
    /**
     * 
     * @param string $string The string value to be check
     * @return boolean The boolean with true||false
     * @description This methos checks for letters ONLY and take out whitespaces, 
     * line breakers, and tabs from the string before test
     * @access public
     */
    public function checkLetters( $string ) 
    {
        return preg_match( "/^[a-zA-Z0-9 ]+$/", $string );
    }
    
    /**
     * @description This method checks if the user pass a valid email address
     * @see ErrorHandler::Set()
     * @access public
     */
    public function checkEmail() 
    {
        if ( !filter_var( $this->_post['Email'], FILTER_VALIDATE_EMAIL ) ) 
        {
            $this->db->error->Set( "This is not a valid email address, please enter another." );
        }
    }
    
    /**
     * @description This method is to check if the password has least one letter uppercase, one lowercase, a special character, a number, 
     * and it length must be longer then seven
     * @see ErrorHandler::Set()
     * @access public
     */
    public function checkPassword() 
    {
        $r1 = "/[A-Z]/";  //Uppercase
        $r2 = "/[a-z]/";  //lowercase
        $r3 = "/[^_<>\\s!@#$%^&*()+={}\\[\\]|\\/\:\;\"?.,®-]/i";//'/[!@#$%^&*()\-_=+{};:,<.>]/';  //'special char'
        $r4 = "/[0-9]/";  //numbers

        if ( preg_match_all( $r1, $this->_post['Password'], $o ) < 1 ) 
        {
            $this->db->error->Set( "The password must contain one uppercase letter." );
        }
        if ( preg_match_all( $r2, $this->_post['Password'], $o ) < 1 ) 
        {
            $this->db->error->Set( "The password must contain one lowercase letter." );
        }
        if ( preg_match_all( $r3, $this->_post['Password'], $o ) < 1 ) 
        {
            $this->db->error->Set( "The password must contain one special character." );
        }
        if ( preg_match_all( $r4, $this->_post['Password'], $o ) < 1 )
        {
            $this->db->error->Set( "The password must contain one number." );
        }
        if ( strlen( $this->_post['Password'] ) < 7 )
        {
            $this->db->error->Set( "The password must be at least 8 characters long." );
        }
        else 
        {
            $this->_callHashOnPassword();
        }
    }
    
    /**
     * @access private
     * @see _hash_password()
     * @description This is just to separate a small logic of hashing the password in a method apart, and it will be call on
     * {@link checkPassword()} method 
     */
    private function _callHashOnPassword()
    {
        $this->_post['Password'] = $this->_hash_password( $this->_post['Password'] ); 
    }
}
