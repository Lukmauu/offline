<?php

/**
 * 
 * @description This is a especificy model with extends Model class, to help Recipe Controller
 * @class Recipe_Model
 * @extends Model 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Recipe_Model extends Model
{
    
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
     * @param string $recipeName The of the recipe if recipe with same name return array of recipes 
     * @return array A array, or nested arrays ( if one name match return, if many return many )
     * @description It returns array anyway [ "true/false", "message" ]
     * @see Toolbox::underscoreOut(), Model::_getRecipesByRecipeName()
     * @access public
     */
    public function getRecipeByName( $recipeName ) 
    {
        $recipeName = $this->underscoreOut( $recipeName );
        $this->db->error->Reset();
        return $this->db->Select( $this->_getRecipesByRecipeName(), array( ':RecipeName' => $recipeName ) );
    }
    
    /**
     *
     * @param interger $RecipeID The $RecipeID only return one row because ids are unique
     * @return array The array with all data from that recipe
     * @description It returns mixed anyway [ "true/false", "message" ]
     * @see Database::Select(); Model::modelReturn, Model::_getRecipeByIdQ()
     */
    public function getRecipeById( $RecipeID ) 
    {
        if ( is_numeric($RecipeID ) )
        {
            $this->db->error->Reset();
            return $this->db->Select( $this->_getRecipeByIdQ(), array( ':RecipeID' => $RecipeID ) );
        }
        else 
        {
            return $this->modelReturn( false, 'Bad request, please try again.' );
        }
    }
}
