<?php

require_once 'NOT_autoload/RecipeForm.php';
/**
 * 
 * This is the main Class of this mvc project
 * 
 * @description This class inherits form Model class 
 * @class Dashboard_Model
 * @extends Model 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Dashboard_Model extends Model
{
    /** 
     * @var RecipeForm This variable holds a instance if Recipe class 
     * @description This object extends the Form class
     * @see Form
     */
    private $_recipeForm;

    public function __construct() 
    {
        parent::__construct();
        $this->_recipeForm = new RecipeForm();
    }
    
    /**
     * 
     * @return array
     * @description Only for test purpose
     */
    private function returnPostTest() 
    {
        $post = array();
        $post['RecipeName'] = 'lucas recipe name test lucas3';
        $post['Instructions'] = 'This is recipe instructions3'; 
        $post['UserName'] = 'Thays';
        $post['Ingredients'] = 'those are the ingredients of this recipe3'; 
        $post['Keywords'] = 'And are the keywods3';
            
        return $post;
    }
    
    /**
     * WARNING This method is intend to be use in a AJAX environment
     * 
     * @description XHR stands for XMLHTTPRequest 
     * @return array The first element of array is the "result" with a boolean if (true/false) and the second "msg" with a message from database
     * @see Database::Insert(), Model::modelReturn(), ErrorHandler::errorReturn();
     */
    public function xhrInsert()
    {
        $basePost = $this->_recipeForm->Init();
        
        if ( !$basePost['result'] ) { return $this->modelReturn( $basePost['result'], $basePost['msg'] ); }
        
        $post = $this->_createArrayForPDOExecute( $basePost['result'] );
        
        // WARNING => need to reset error objects to start new check of those insert that will happen
        $this->db->error->Reset();
        
        $this->db->beginTransaction();

        $this->db->Insert( $this->_recipeInsertQ(), $post );
        
        if( $this->db->error->Count() > 0 )
        {
            $this->db->rollBack();
            return $this->db->error->errorReturn();
        }
        else
        {
            $this->db->commit();
            return $this->modelReturn( true, "Saving the data was a success! Thank You." );
        }
    }
    
    /**
     * 
     * @param string $UserName The name of the user that want to retrive recipes
     * @return mixed ErrroHandler->baseReturn()
     * @description Get the recipes base on the UserName
     * @see Model::_getRecipesByNameQ()
     * @access public
     */
    public function getRecipes( $UserName ) 
    {
        $this->db->error->Reset();
        $queryFail = "This user has no recipes yet, or request fail reload the page and try again";
        $zeroRow = "This user has no recipes yet";
        return $this->db->Select( $this->_getRecipesByNameQ(), array( ':UserName' => $UserName ), $queryFail, $zeroRow );
    }
    
    /**
     *
     * @param integer $id The RecipeID number passed in
     * @return array A array form Model->modelReturn() method which includes a "result" and a "msg" key
     * @description This method return the recipe by id
     * @see Model::_getRecipeByIdQ()
     * @access public
     */
    public function editRecipe( $id ) 
    {
        if ( is_numeric( $id ) )
        {
            $this->db->error->Reset();
            $failMsg = "This user has no recipes yet, or request fail reload the page and try again";
            $zeroRowMsg =  "Has no recipes with that ID ( " . $id . " )";
            return $this->db->Select( $this->_getRecipeByIdQ(), array( ':RecipeID' => $id ) , $failMsg, $zeroRowMsg );
        }
        else 
        {
            return $this->modelReturn( false, 'Bad request, please try again.' );
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return mixed The array that comes back from ErrorHandler->errorReturn()
     * @access public
     */
    public function deleteRecipe( $id ) 
    {
        if ( is_numeric( $id ) )
        {
            $this->db->error->Reset();
            $query = "DELETE FROM recipe WHERE recipe.RecipeID=:RecipeID LIMIT 1";
            return $this->db->Delete( $query, array( ':RecipeID' => $id ) );
        }
        else
        {
            return $this->modelReturn( false, 'Bad request, please try again.' );
        }
    }
    
    /**
     * 
     * @param integer $id ( The ID of the recipe to update ) 
     * @return array ( @see Model->modelReturn() )
     * @see _updateRecipeByIdQ(), _createArrayForPDOExecute()
     * @access public
     */
    public function xhrUpdate( $id ) 
    {
        if ( is_numeric( $id ) )
        {
            $basePost = $this->_recipeForm->Init();
        
            if ( !$basePost['result'] ) { return $this->modelReturn( $basePost['result'], $basePost['msg'] ); }
        
            $this->db->error->Reset();
        
            $post = $basePost['result'];
                
            $post['RecipeID'] = $id; 
        
            $_internalArray = $this->_createArrayForPDOExecute( $post );
        
            return $this->db->Update( $this->_updateRecipeByIdQ(), $_internalArray );
        }
        else
        {
            return $this->modelReturn( false, 'Bad request, please try again.' );
        }
    }
        
    /**
     * 
     * WARNING This method assumes that the keys of the array pass in matchs the params names on the PDOStatement::prepare() 
     * 
     * @param mixed $post ( This is the that came from the POST request, or GET )
     * @return array
     * @description This method prepare a mixed with the keys being the params for PDO prepare Statement and the value for each key
     * @access private
     */
    private function _createArrayForPDOExecute( $post ) 
    {
        $post = $this->_addSearchField( $post );
        
        $_internalArray = array();
        foreach ( $post as $key => $value ) 
        {
            $_internalArray[":$key"] = $value;
        }
        
        return $_internalArray;
    }
    
    //** QUERIES **//
    /**
     * 
     * @return string The query string needed to insert data on the recipe table
     * @access private
     */
    private function _recipeInsertQ() 
    {
        return "INSERT INTO recipenew (RecipeName, Date, Instructions, SubmitterName, Notes, PrepTime, CookTime, Ingredients, Keywords, Search)"
               ." VALUES (:RecipeName, CURDATE(), :Instructions, :SubmitterName, :Notes, :PrepTime, :CookTime, :Ingredients, :Keywords, :Search)";
    }
    
//    public function functionName($param)
//    {
//        var = Array
//(
//    [:RecipeName] => Grilled ,
//    [:Ingredients] => 1 pound ,
//    [:Instructions] => 1. Bring a large pot of li
//    
//    [:PrepTime] => 35 Minutes
//    [:CookTime] => 20 Minutes
//    [:Notes] => 
//    
//    [:Keywords] => cheese, beef, pork,
//    [:UserName] => Thays,
//    [:Search] => Grilled Brown Sugar Pork Chops 
//)
//
//    }
    
    /**
     * 
     * @return string The query string needed to update the recipe by RecipeID
     * @access private
     */
    private function _updateRecipeByIdQ() 
    {
        return "UPDATE recipenew"
               . " SET RecipeName=:RecipeName, Instructions=:Instructions,"
               . " Notes=:Notes, PrepTime=:PrepTime, CookTime=:CookTime,"
               . " Ingredients=:Ingredients, Keywords=:Keywords, Search=:Search"
               . " WHERE RecipeID=:RecipeID";
    }
    //** QUERIES **//
    
    /**
     * STARTING ADMIN SECTION
     */
    /**
     *
     * @description Get a user on the database by name  
     * @param String $UserName The name of the user you want to returve information
     * @return mixed The array that comes from errorReturn()
     * @access public
     * @see ErrorHandler->errorReturn()
     */
    public function getUser( $UserName ) 
    {
        $this->db->error->Reset();
        $query = "SELECT * FROM login WHERE UserName=:UserName LIMIT 1";
        $queryFail = "This request fail reload the page and try again";
        $zeroRow = "There no with this name on the database yet";
        return $this->db->Select( $query, array( ':UserName' => $UserName ), $queryFail, $zeroRow );
    }
    
    /**
     *
     * @description Retrive all the data from all the users on the database 
     * @return mixed The array that comes from errorReturn()
     * @access public
     * @see ErrorHandler->errorReturn()
     */
    public function getAllUser() 
    {
        $this->db->error->Reset();
        $query = "SELECT UserID, FirstName, LastName, Email, UserName, Role FROM login WHERE Role='member'";
        $queryFail = "This request fail reload the page and try again";
        $zeroRow = "There no users on the database yet";
        return $this->db->Select( $query, false, $queryFail, $zeroRow );
    }
    
    /**
     * 
     * @param array $pos
     * @return string
     * @access private
     */
    private function _addSearchField( $post )
    {   
        $post['Search'] = $post['RecipeName'] . " .:||:. "
                          . $post['Ingredients'] . " .:||:. "
                          . $post['Keywords'];
        return $post;
    }
}

