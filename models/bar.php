<?php

/**
 * @access public
 * @name Bar This is a class with only purpose of helping the NetBeans intellesense
 */
class Bar extends Database {

    /**
     * @var String The table name for this modal
     * @name $_tableName
     * @access private 
     */
    private $_tableName;

    private $_keys = [];
    
    private $_normalKeys = [];
    
    private $_id;
    /**
     * @internal This intend to explicit to be public, and call the parent __construct() also.
     * @access public
     */
    public function __construct($tableName=false) {
        parent::__construct();
        $this->_tableName = !$tableName ? get_class($this)."s" : $tableName;
        $this->_id = null;
        $this->_load($this->Select("Select * FROM ".$this->_tableName." LIMIT 1"));
    }
    
    public function Create($data=false) {
        $holder_ = $this->buildInsertQuery(!$data ? $this->_normalKeys : $data, $this->_tableName);
               
        return $this->Insert($holder_);
    }
    public function Erase($id) {
        
        $holder_ = $this->buildDeleteQuery([$this->_id=>$id], $this->_tableName);
        
        return $this->Delete($holder_["query"], $holder_["placeholders"]);
    }
    
    private function _load($array) {
        $array_ = $array['result'];
        if (!$array_) { $this->error->Set("Problem on _load"); return false; }
        
        $this->_normalKeys = $array_;
        
        foreach ($array_ as $key => $value) {
            $this->_setMainTableId($key);
            $this->{$key} = (Toolbox::hasValue($value)) ? false : $value;
            $this->_keys[":".$key] = $value;
        }
    }

    protected function findOnString($toFind, $on) {
        return (strpos($on, $toFind) !== false);
    }
    
    private function _setMainTableId($withThisKey) {
        if ($this->_id === null) {
            if ($this->findOnString("id", $withThisKey)) {
                $this->_id = $withThisKey;
            }
        }
    }
    
}
