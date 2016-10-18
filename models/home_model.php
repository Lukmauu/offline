<?php

/**
 * 
 * @description This is a especificy model with extends Model class, to help Home Controller
 * @class Home_Model
 * @extends Model 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014 changed 06/05/2016
 * @access public
 */
class Home_Model extends Model 
{
    /**
     * Always __construct the parent::
     * 
     * @description Start the {@link _count} variable
     * @access public
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function getClients() 
    {
        $this->db->error->Reset();
        return $this->db->Select($this->_getClientsHelper);
    }
   
    public function _getClientsHelper() 
    {
        return "SELECT * FROM clients";
    }
    
    /**
     * 
     * @return mixed The array that comes the main return od the Database with two value "result" and "msg"
     * @description Get all the recipes in the Database
     * @see Database::Select()
     * @access public
     */
    public function getData()
    {
        $this->db->error->Reset();
        return $this->db->Select( $this->_getDataHelper() );
    }
    
    /**
     * @return string The string query that selects all recipes form the Database
     * @description This is a private method intend to be use only for getData() method 
     * @access private
     */
    private function _getDataHelper() 
    {
        return "SELECT RecipeID, RecipeName, Date, SubmitterName, Keywords FROM recipenew";
    }
    
    /**
     * 
     * @return string The string query to be use to search data on Database
     * @description This method is intend to only help searchData() method
     * @access private
     */
    private function _searchDataQuery() 
    {
        return  "SELECT *,"
                ." MATCH ( Search )"
                ." AGAINST ( :forRelevance )" 
                ." AS relevance FROM recipenew"
                ." WHERE"
                ." MATCH ( Search )" 
                ." AGAINST ( :forBooleanMode IN BOOLEAN MODE )"
                ." ORDER BY relevance DESC";
    }
    
    /**
     * 
     * @param integer $page The page the user want to retrive from the query
     * @see _searchDataHelper(), _getPaginationOptions(), pagination, Model::modelReturn()
     * @access public
     * @return array
     */
    public function searchData( $page ) 
    {  
        return $this->search->getBy( $page );
    }
}
