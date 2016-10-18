<?php

/**
 * Need for extends
 */
require_once 'NOT_autoload/SearchBase.php';
/**
 * 
 * @description This is a especificy model with extends Model class, to help Recipe Controller
 * @class Search_Model
 * @extends Model 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Search_Model extends SearchBase 
{
    /**
     * 
     * @access public
     * @description Always __construct the parent::
     */
    public function __construct() 
    {
        parent::__construct( DETAIL_SEARCH_URL, $this->_getByIngredientsQ() );
    }
    
    /**
     * 
     * @param integer $page The page the user want to retrive from the query
     * @see _getByIngredientsHelper(), _getPaginationOptions(), _getByIngredientsQ(), page(), Model::modelReturn()
     * @return array
     * @access public
     */
    public function getByIngredients( $page ) 
    {
        return $this->getBy( $page );
    }
    
    /**
     * 
     * @return string The string query needed for getByIngredients method
     * @description The PDO params are :forRelevance, and :forBooleanMode
     * @access private
     */
    private function _getByIngredientsQ() 
    {
        return "SELECT *,"
               ." MATCH ( Ingredients )"
               ." AGAINST ( :forRelevance )"
               ." AS relevance FROM recipenew" 
               ." WHERE"
               ." MATCH ( Ingredients )"
               ." AGAINST ( :forBooleanMode IN BOOLEAN MODE )"
               ." ORDER BY relevance DESC";
    }
}
