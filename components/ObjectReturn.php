<?php

class ObjectReturn {

    /**
     *
     * @var String
     * @name $query
     */
    public $query;
    
    /**
     *
     * @var Array
     * @name $toBindArray
     */
    public $toBindArray;
    
    /**
     * 
     * @param String $query
     * @param Array $toBindArray
     * @return \ObjectReturn
     */
    public static function returnItself($query, $toBindArray) {
        $this->query = $query;
        
        $this->toBindArray = $toBindArray;
        
        return $this;
    }

}
