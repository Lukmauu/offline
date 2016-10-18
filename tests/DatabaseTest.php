<?php

$basePath = filter_input(INPUT_SERVER, "DOCUMENT_ROOT");
require_once $basePath . 'components/Database.php';

class DatabaseTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
		$this->db = new Database("name");
	}	
}