<?php

$basePath = filter_input(INPUT_SERVER, "DOCUMENT_ROOT");
require_once $basePath . 'components/Toolbox.php';

class ToolboxTest extends PHPUnit_Framework_TestCase {
	
    public function setUp() {
        $this->tool = new Toolbox();
    }
    
    public function testFindIn() {
        
        $this->assertClassHasStaticAttribute("FindIn", "Toolbox");
        
    }
    
}