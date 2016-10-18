<?php
/**
 * This has some method to models in general and also extends Toolbox with has more helper methods that are shared between View and model, but on View its instanciate Toolbox and model extends
 * 
 * @class Model
 * @extends Toolbox
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Model extends Toolbox
{
    /**
     *  
     * @var Database A new instance of Database class for each Model  
     * @description This is a global reference to Database
     * @access protected
     * @ATTENTION Each Model will have a instance of Database 
     */
    protected $db;
    
    public $tableName = "";
    
    public function __construct() 
    {
        parent::__construct();
        $this->db = new Database();
    }
    
    /**
     * 
     * @param boolean $true The default is false, if passed in sets the Date for display, and if default value 
     * sets the Date for database format
     * @return string The date in form of string 
     * @access public
     * @description This method is just a test might be delete in the future
     */
    public function getDateFormat( $true=false )
    {
        $unixTime = time();
        $time = getdate( $unixTime );
        //Array
        //(
        //   [seconds] => 48
        //   [minutes] => 54
        //   [hours] => 12
        //   [mday] => 20
        //   [wday] => 2
        //   [mon] => 12
        //   [year] => 2011
        //   [yday] => 353
        //   [weekday] => Tuesday
        //   [month] => December
        //   [0] => 1324403688
        //)
        $string = $true ? substr( $time['month'], 0, 3 ) . '-' . $time['mday'] . '-' . $time['year'] : 
                    $time['year'] . '-' . substr( $time['month'], 0, 3 ) . '-' . $time['mday'];
        return $string;
    }
    
    /**
     * 
     * @param string $recipeName The name of the recipe, to check if has only letters and the underscore to be a nice url on the browser
     * @return boolean If recipe name is well formated or not
     * @access public
     */
    public function underscoreAndLetterCheck( $recipeName ) 
    {
        return preg_match( "/^[a-zA-Z_]{1,}$/", $recipeName ); 
    }
    
    /**
     * 
     * ATTENTION this method is used as main return for the application
     * 
     * @param boolean||any $boolean Set false, or true for the return, and it could anytype of data to response back to the user
     * @param string $msg The message of success or fail that will display back to the user
     * @param string $error But the default is a boolean "false". This parameter is intended to pass any error message that came from a database error (raw message not much informative but good for debug)
     * @return array A array with two elements "result" with true/false and the "msg" with the message passed in
     * @description This method is to be use return a array with response for other methods
     * @access public
     */
    public function modelReturn( $boolean, $msg, $error=false ) 
    {
        return $error ? 
                array( "result" => $boolean, "msg" => $msg, "error" => $error ) :
                array( "result" => $boolean, "msg" => $msg );
    }
    
    // QUERIES
    /**
     * 
     * @param boolean $flag The default for this id (false)
     * @return string The query string needed to SELECT a recipe, and if no param passed will return a string that select the
     * recipe by RecipeName, or if (true) is pass will return the string that select the recipe by RecipeID
     * @see protected
     */
    protected function _getRecipesQ( $flag=false ) 
    {
        $string = "SELECT RecipeID, RecipeName, Date, Instructions, SubmitterName,"
                  ." Notes, PrepTime, CookTime,"
                  ." Ingredients, Keywords FROM recipenew";
        if ( !$flag )
        {
            $string .= " WHERE SubmitterName=:UserName";   
        }
        else
        {
            $string .= " WHERE RecipeID=:RecipeID";   
        }
        return $string;
    }
    
    /**
     * 
     * @return string The query string needed to get recipes by RecipeID
     * @access protected
     * @see _getRecipesQ()
     */
    protected function _getRecipeByIdQ() 
    {
        return $this->_getRecipesQ( true );
    }
   
    /**
     * 
     * @return string The query string needed to get recipes by RecipeName
     * @access protected
     * @see _getRecipesQ()
     */ 
    protected function _getRecipesByNameQ() 
    {
        return $this->_getRecipesQ();
    }
    
    /** 
     * 
     * @description This method to fetch all the recipe by RecipeName
     * @return string The string needed for the prepare statement
     * @access protected
     */
    protected function _getRecipesByRecipeName() 
    {
        $string = "SELECT RecipeID, RecipeName, Date, Instructions, SubmitterName,"
                  ." Notes, PrepTime, CookTime, Ingredients, Keywords"
                  ." Ingredients, Keywords FROM recipenew"
                  ." WHERE RecipeName=:RecipeName";   
        return $string;
    }
    // QUERIES
    
    /**
     * public method
     */
    public function createFieldFromTable($tableName)
    {
        echo $tableName;exit;
        
        if ($this->tableName === "")
        {
            $this->tableName = $tableName;
        }
        
        
        $this->db->error->Reset();
        return $this->db->Select("SELECT * FROM {$this->tableName} LIMIT 1");
    }
}