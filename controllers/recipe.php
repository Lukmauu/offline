<?php

/**
 * 
 * This is the Controller to help with recipe
 * 
 * @class Recipe
 * @extends Controller
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Recipe extends Controller
{
    /**
     * 
     * Always __construct the parent::
     * 
     * @access public
     */
    public function __construct()
    {
        parent::__construct( get_class( $this ) );
    }
    
    /**
     * 
     * @param string $recipeName The name of the recipe to get the value this could be duplicate
     * @param integer $recipeId The ID of of the recipe, this is unique 
     * @see _getRecipeHelper(), Model::getRecipeById(), Model::getRecipeByName()
     * @access public
     */
    public function Index( $recipeName, $recipeId=false ) 
    {
        if ( ctype_alnum( $recipeId ) )
        {
            $data = $this->model->getRecipeById( $recipeId );
            $this->_getRecipeHelper( $data );
        }
        else
        {
            $data = $this->model->getRecipeByName( $recipeName );
            $this->_getRecipeHelper( $data );
        }
    }
    
    /**
     * 
     * @param mixed $data The data the comes from Database
     * @access private
     */
    private function _getRecipeHelper( $data ) 
    {
        $this->view->msg = $data['msg'];
        $this->view->recipe = $data['result'];
        $this->view->render('recipe/index');
    }
}