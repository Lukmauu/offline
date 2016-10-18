<?php

// leave on test
error_reporting( E_ALL | E_STRICT );


/**
 * THIS IS THE MAIN INDEX
 */
//define('COMP', 'Components/');
//define('EXT', '.php');


if (!defined("COMP")) {
    require 'config/defines.php';
}

spl_autoload_register(function ($class) {
    require COMP . $class . EXT;
});

//foreach (['Bootstrap', 'Controller', 'Database', 'ErrorHandler', 'Model', 'Session', 'Toolbox', 'View'] as $class_name_)
//{
//    require_once COMP . $class_name_ .EXT;
//} 
//
//require_once 'config/define.php';

$app = new Bootstrap(true);

$app->Init();
