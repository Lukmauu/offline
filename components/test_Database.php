<?php
/*
* http://php.net/manual/en/pdostatement.execute.php
* base on this I need to test and alter this class
*/


/**
 * This class initialize PDO database connection and extends PDO, and provide some methods to help SELECT, DELETE, INSERT, and UPDATE
 * 
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 12/06/2015
 * @access public
 * @name Database
 */
class Database extends Query {
    /**
    * @var PDOStatement $_statement Hold the PDO statment return
    * @access private
    */
    private $_statement;
    
    
    
    
    /**
     * @description This __construct instantiate the ErrorHandler and __contruct the PDO class
     * before loading the option array and passing that too the PDO __construct
     * @access public
     * @see ErrorHandler
     */
    public function __construct() {
        parent::__construct();
        $this->error = new ErrorHandler();
    }
    
    /**
     * WARNING This method assumes that data passed in is well filter and sanitize
     * 
     * 
     * @param string $query The query that you want to perform on the database.
     * @param mixed||boolean $array Default is false, or a array with the param values to bind on the query if any needed.
     * @param string $queryFail A message to display when query fails, it has a default value.
     * @param string $zeroRow A message to display when zero row a affected, it has a default value.
     * @return mixed The associative array with the results more info => {@link ErrorHandler::errorReturn}
     * @see Database->_return, ErrorHandler::baseReturn(), ErrorHandler::Set() 
     * @access public 
     */
    public function Select($query, $array=false, $queryFail=QUERY_FAIL, $zeroRow=ZERO_ROW) {
        if ($this->_prepareErrorHandler($query)) {
            if ($array) {
                $this->_selectWithArrayToBind($array);
            } 
            $this->error->Check($this->_statement->execute(), $this->_statement);
        }
        if ($this->error->hasError() || !$this->_statement) {
            $this->error->Set($queryFail);
            return $this->_return();
        }
        else {
            $data = $this->_statement->fetchAll();
            $rowCount = $this->_statement->rowCount();
            return  $rowCount === 0 
                        ? $this->error->baseReturn(false, $zeroRow)
                        : $this->error->baseReturn($rowCount === 1 ? $data[0] : $data, "It was a success, thank you!");
        }
    }
    
    /**
     * 
     * @internal This function only exist to abstract the PDOStatement::bindValue() from Database->Select() method.
     * @param mixed $array Values to be bind in the query
     * @access private
     * @return void
     */
    private function _selectWithArrayToBind($array)
    {
        foreach ($array as $key => $value) {
            try {
                $this->_statement->bindValue("$key", $value);
            }
            catch (PDOException $e) {
                $this->error->Set($e);
            }
        }
    }

    /**
     * WARNING This function assumes that data passed in is well filter and sanitize
     * 
     * 
     * @param string $query The string of that data will be inserted.
     * @param array $data The array with the data that you want to insert.
     * @param string|boolean $message Any message to be display after success operation, the default is "false". 
     * @return mixed The associative array with the results more info => {@link ErrorHandler::errorReturn}
     * @access public
     */
    public function Insert($query, $data=false, $message=false) {
        return (!$data && is_array($query)) ? 
            $this->_check($query["query"], $query["toBindArray"], $message) :
            $this->_check($query, $this->_prepareToBindArray($data), $message);
    }
    
    /**
     * WARNING This function assumes that data passed in is weel filter and sanitize
     * 
     *
     * @param string $query A string with the query to be perform. 
     * @param mixed $data An associative array with the data where to be update.
     * @param string|boolean $message Any message to be display after success operation, the default is "false". 
     * @return mixed More info look at {@link ErrorHandler::errorReturn()}
     */
    public function Update($query, $data, $message=false) {
        $message_ = !$message ? "The update fails, please try again!" : $message;
        return $this->_check($query, $data, $message_);
    }
    
    /**
     * 
     * @param string $query The query string to do deletion.
     * @param mixed $data The array with the data to be bind.
     * @param string|boolean $message Any message to be display after success operation, the default is "false". 
     * @see ErrorHandler::Check
     * @return mixed More info look at {@link ErrorHandler::errorReturn()}
     */
    public function Delete($query, $data, $message=false) {
        $message_ = !$message ? "the deletion fail, please try again!" : $message;
        return $this->_check($query, $data, $message_);
    }
    
    private function _prepareErrorHandler($query) {
     
        try {
            $this->_statement = $this->prepare($query); 
        }
        catch (PDOException $e) {        
            $this->error->Set($e);
        }
        
        return !$this->error->hasError();
    }
    
    private function _return() {
        return $this->error->errorReturn();
    }

    private function _check($query, $data, $message=false, $return=false) {
        if ($this->_prepareErrorHandler($query)) {
            $this->error->Check($this->_statement->execute($data), $this->_statement, $message);
        }
        
        if (!$return) {
            return $this->_return();
        }
    }
    
    private function _prepareToBindArray($array) {
        if (!is_array($array)) { $this->error->Set("Trying to bind on statement with invalidate data from assoc Array!"); return false; }
        $newArray_ = [];
        foreach ($array as $key => $value) {
            $newArray_[":".$key] = $value;
        }
        return $newArray_;
    }
    
    
    
}