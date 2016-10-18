<?php

class Query extends PDO {
    
    /**
     *
     * @var PDOE 
     */
    private $_errorTempHolder;
    
    /** 
     * @var ErrorHandler $error To hold instance of the Error class object 
     * @access public
     */
    protected $error;
    /**
     * @var Array
     * @name $_arrayPlaceholders
     * @access private
     */
    private $_placeholders;
    /**
     * @var String Holds the query for SELECT(which can be more complicate to produce)
     * @name $_selectQuery
     * @access private
     */
    private $_query;
    //http://stackoverflow.com/questions/535464/when-not-to-use-prepared-statements?lq=1
    //think you want PDO::ATTR_EMULATE_PREPARES. That turns off native database prepared statements, but still allows query bindings to prevent sql injection and keep your sql tidy. From what I understand, PDO::MYSQL_ATTR_DIRECT_QUERY turns off query bindings completely.
    /** 
     * @var array The options for the PDO connection
     * @access private
     */
    private $_options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false);
    
    public function __construct() {
        $this->error = new ErrorHandler();
        
        $this->error->Set("This is a error message, a fake one!");
        $this->error->printIt();
                    
        try {
            parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $this->_options);
        } 
        catch (PDOException $e) {
            $string = "<h4>".$e->getMessage(); 
            if (Session::isLocal()){
                $string .= "<br />ON: " . $e->getFile() . "<br />LINE: " . $e->getLine(); 
            }
            $string .= "<br />Please try again!</h4>";
            echo $string;
            exit;
        }
    }
    
    /**
     * As the name says this method builds a query in PDO format.
     * 
     * @param Array $array The associate Array with the keys to build the query.
     * @param String $tableName The name of the table that needs to update, or insert.
     * @param Boolean $duplicate A flag to decide if on duplicate key it should update isntead insert, the default is false which ON DUPLICATE KEY UPDATE.
     * @return Array A associate Array with 2 keys ("query" => With query itself with PDO variable, like this (:placeholder)) and ("toBindArray"=>A Array with the keys in placehorlders format to be bind later on the PDO::Statement).
     * @access public
     * @name $buildInsertQuery
     */
    public function buildInsertQuery($array, $tableName, $duplicate=false) {
        //getting the last key of this Array
        // => http://stackoverflow.com/questions/2348205/how-to-get-last-key-in-an-array
        $lK_ = key(array_slice($array, -1, 1, true));
        
        $first_ = "INSERT INTO " . $tableName . " ("; 
        $second_ = ""; 
        $third_ = " ON DUPLICATE KEY UPDATE ";
        $newArrayWithPlaceholders = [];
        
        foreach ($array as $k => $v) {
            $first_ .= ($k == $lK_) ? $k . ") VALUES (" : $k . ", "; 
           
            $second_ .= ($k == $lK_) ? ":".$k.") " : ":".$k.", ";
            
            $third_ .= (!$duplicate) ? ($k == $lK_) ? $k."=values(".$k.")" : $k."=values(".$k .")".", " : "";
            
            $newArrayWithPlaceholders[":".$k] = $v;
        }
        
        return $this->_returnItself($first_.$second_.$third_, $newArrayWithPlaceholders);
    }
    
    /**
     * 
     * @param type $array
     * @param type $tableName
     * @return Array
     */
    protected function buildDeleteQuery($array, $tableName) {
        $query_ = "DELETE FROM " . $tableName . " WHERE ";
        $toBindArray_ = [];
        $c = 0;
        
        $lK_ = $this->lastKeyFromArray($array);
        
        foreach ($array as $k => $v) {
            $c++;
            $query_ .= ($k == $lK_) ? $k."=:value".$c : $k."=:value".$c.", ";
            $toBindArray_[":value".$c] = $v;
        }
        
        return $this->_returnItself($query_, $toBindArray_);
    }
    
    protected function buildSelectQuery($array, $tableName, $limit=false) {
        $first_ = "SELECT ";
        $second_ = "";
        $third_ = "";
        $lK_ = $this->lastKeyFromArray($array);
        
        foreach ($array as $k => $v) {
            $first_ .= ($k == $lK_) ? $k . " FROM ".$tableName." ": $k . ", "; 
           
            $newArrayWithPlaceholders[":".$k] = $v;
        }
        $first_ .= $limit ? $limit : "";
        
        return ObjectReturn::returnItself($first_, $newArrayWithPlaceholders);
    }
    
    protected function lastKeyFromArray($array) {
        return key(array_slice($array, -1, 1, true));
    }
    
    protected function selectFromWhere($query, $whereArray) {
        $lK_ = $this->lastKeyFromArray($whereArray);
        foreach ($whereArray as $key => $value)
        {
            $query .= " ".$key."=".$value;
            $query .= ($key == $lK_) ? " " : " AND ";
        }
        return $query;
    }
    
    protected function matchAgainst($param)
    {
        
    }
    
    /**
     * @param String $string
     * @param Array $array
     * @return Array
     * @access private
     */
    private function _returnItself($string, $array) {
        return ["query"=>$string, "placeholders"=>$array];
    }
}
