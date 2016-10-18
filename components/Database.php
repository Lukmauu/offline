<?php

/**
 * This class initialize PDO database connection and extends PDO, and provide some methods to help SELECT, DELETE, INSERT, and UPDATE
 * 
 * @class Database
 * @extends PDO
 * @author Lucas Oliveira <lukmauu@hotmail.com>
 * @since 06/18/2014
 * @access public
 */
class Database extends PDO
{
    private $select_;
    /** 
     * @var array The options for the PDO connection
     * @access private
     */
    private $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false);
    
    /** 
     * @var ErrorHandler $error To hold instance of the Error class object 
     * @access public
     */
    public $error;
    
    /**
     * @description This __construct instantiate the ErrorHandler and __contruct the PDO class
     * before loading the option array and passing that too the PDO __construct
     * @access public
     * @see ErrorHandler
     */
    public function __construct() 
    {
        $this->error = new ErrorHandler();
        try 
        {
            parent::__construct( DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $this->options );
        } 
        catch ( Exception $e ) 
        {
            $string = "<h1>";
            $string .= $e->getMessage(); 
            $string .= "<br />Please try again!";        
            $string .= Session::isLocal() ? "<br />  ON: " . $e->getFile() . "<br />LINE: " . $e->getLine() : ""; 
            $string .= "</h1>";
            $string .= "<small>If problem persist contact developer lukmauu@hotmail.com</small>";
            // Just echo for now ***FIX_LATER***
            echo $string;
            exit;
        }
    }
    
    /**
     * WARNING This method assumes that data passed in is well filter and sanitize
     * 
     * 
     * @param string $query The query that you want to do on the Database
     * @param mixed $array Default false, the param to bind on the query if any needed
     * @param string $queryFail A message to display when query fails, it has a default value;
     * @param string $zeroRow A message to display when zero row a affected, it has a default value;
     * @return mixed The associative array with the results more info => {@link ErrorHandler::errorReturn}
     * @see ErrorHandler::errorReturn(), ErrorHandler::baseReturn(), Toolbox::desanitizePost(), ErrorHandler::Set() 
     * @access public 
     */
    public function Select($query, $array=false, $queryFail=QUERY_FAIL, $zeroRow=ZERO_ROW) 
    {
        try
        {
            $stmt = $this->prepare($query); 
              
            if ($array)
            {
                $stmt = $this->_SelectHelperForeach($array, $stmt);
            } 
            $this->error->Check( $stmt->execute(), $stmt );
            $this->select_ = $stmt;
        }
        catch (PDOException $e)
        {
            $string = ""; 
            $string .= $e->getMessage(); 
            if ( Session::isLocal() )
            {
                $string .= "<br />ON: " . $e->getFile() . "<br />LINE: " . $e->getLine(); 
            }
            $string .= "<br />Please try again!";        
            $this->error->Set( $string );
        }        
      
        return $this->SelectReturnHelper($this->select_, $queryFail, $zeroRow);
    }
    
    private function _SelectHelperForeach($array_, $stmt_)
    {
        foreach ($array_ as $key => $value) 
        {
            $stmt_->bindValue( "$key", $value );
        }
        return $stmt_;
    }


    public function SelectReturnHelper($stmt, $queryFail, $zeroRow)
    {
        if ($this->error->Count() > 0 || !$stmt)
        {
            $this->error->Set( $queryFail );
            var_dump( $this->error->errorReturn());
            return $this->error->errorReturn();
        }
        else
        {
            $data = $stmt->fetchAll();
            $rowCount = $stmt->rowCount();
            if ( $rowCount === 0 )
            {
                return $this->error->baseReturn( false, $zeroRow ); 
            }
            else if ( $rowCount === 1 )
            {
                return $this->error->baseReturn( Toolbox::desanitizePost( [0] ), "It was a success, thank you!" );
            }   
            return $this->error->baseReturn(  $data , "It was a success, thank you!" );
        }
    }
    
    /**
     * WARNING This function assumes that data passed in is well filter and sanitize
     * 
     * 
     * @param string $query The string of that data will be inserted
     * @param array $data The array with the data that you want to insert
     * @return void
     * @see ErrorHandler::Check()
     * @access public
     */
    public function Insert( $query, $data, $errorMsg=false ) 
    {
        try {
            $stmt = $this->prepare( $query );
            $this->error->Check( $stmt->execute( $data ), $stmt, $errorMsg );
        } catch (PDOException $e) {
            
            $string = "";
            $string .= $e->getMessage(); 
               
            if ( Session::isLocal() )
            {
                $string .= "<br />ON: " . $e->getFile() . "<br />LINE: " . $e->getLine(); 
            }
            $string .= "<br />Please try again!";        
            
            $this->error->Set( $string );
        }
        return $this->error->errorReturn();
    }
    
    /**
     * WARNING This function assumes that data passed in is weel filter and sanitize
     * 
     * 
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where The WHERE query part
     * @see ErrorHandler::Check
     * @return array More info look at {@link ErrorHandler::errorReturn()}
     */
    public function Update( $query, $data ) 
    {
        try {
            $stmt = $this->prepare( $query ); 
            $this->error->Check( $stmt->execute( $data ), $stmt, "The update fail, please try again!" );
        } catch (PDOException $e) {
            
            $string = "";
            $string .= $e->getMessage(); 
               
            if ( Session::isLocal() )
            {
                $string .= "<br />ON: " . $e->getFile() . "<br />LINE: " . $e->getLine(); 
            }
            $string .= "<br />Please try again!";        
            
            $this->error->Set( $string );
        }
        return $this->error->errorReturn();
    }
    
    /**
     * 
     * @param string $query The query string to do deletion
     * @param mized $data The array with the data to be bind
     * @see ErrorHandler::Check
     * @return array More info look at {@link ErrorHandler::errorReturn()}
     */
    public function Delete( $query, $data )  
    {
        try {
            $stmt = $this->prepare( $query );
            $this->error->Check( $stmt->execute( $data ), $stmt, "The deletion fail, please try again!" );
        } catch (PDOException $e) {
            
            $string = "";
            $string .= $e->getMessage(); 
               
            if ( Session::isLocal() )
            {
                $string .= "<br />ON: " . $e->getFile() . "<br />LINE: " . $e->getLine(); 
            }
            $string .= "<br />Please try again!";        
            
            $this->error->Set( $string );
        }
        return $this->error->errorReturn();            
    }
}