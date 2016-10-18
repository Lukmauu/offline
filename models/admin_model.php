<?php

// Needed to require Login Model here, so this class could inherit all the goods from that Model
require_once 'models/dashboard_model.php';

/**
 * 
 * @description This class inherits form Dashboard_Model class 
 * @class Admi_Model
 * @extends Dashboard_Model
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Admin_Model extends Dashboard_Model
{
    /**
     * 
     * Always __construct the parent::
     * 
     * 
     * @access public
     */
    public function __construct() 
    {
        parent::__construct();
    }
}
