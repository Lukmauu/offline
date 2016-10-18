<?php

// Needed to require Login Model here, so this class could inherit all the goods from that Model
require_once 'models/login_model.php';

/**
 * 
 * @description This is the Model is to help with with LoginAdmin Controller, but this class extends The Login Model
 * @class LoginAdmin
 * @extends Login_Model
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 * @see Login_Model
 */
class Loginadmin_Model extends Login_Model 
{
    /**
     * 
     * Always __construct the parent::
     * 
     * @access public
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    /**
     * 
     * @return array A array with a true value if the password match and on false a 
     * boolean false, and a message all with the modelReturn method
     * @description This method will select the row in the database and verify if the 
     * password in the database match with the password passed form the user and return the a 
     * array with the "result" and a "msg"
     * @see Toolbox::sanitize(), _runHelper(), Model::modelReturn()
     * @access public
     */
    public function run() 
    {
        $query = "SELECT * FROM login WHERE UserName=:username";
        if ( ( $post = Toolbox::sanitize( INPUT_POST, ['UserName', 'Password' ], true ) ) )
        {
            /**
             * This returns a array look at {@link ErrorHandler::errorReturn()}
             */
            $data = $this->db->Select( $query, [':username' => $post['UserName']] );
            
            if ( $data['result'] !== false ) 
            {
                return $this->_runHelper( $post['Password'], $data['result'] );
            }
        }
        return $this->modelReturn( false, 'Username did not match, Please try again.' );
    }
    
    /**
     * 
     * @param string $toVerify The password that comes from the user
     * @param array $result The data the comes from the database
     * @return array This return is base on modelReturn 
     * @description This not intended to be use outside this class, it verifies 
     * if the user pass a valid password and return a array base on modelReturn 
     * @access private
     * @see Toolbox::_password_verify_hash(), Model::modelReturn() 
     */
    private function _runHelper( $toVerify, $result ) 
    {
        if ( $this->_password_verify_hash( $toVerify, $result ) && $result['Role'] === 'admin' )
        {
            return $this->modelReturn(true, "The login was a success, we are going to redirect to your Dashboard.");
        }
        return $this->modelReturn(false, 'Password did not match, or you are not the Administrator, Please try again.');
    }
}