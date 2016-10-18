<?php

define("COMP", "components/");
define("EXT", ".php");
define('BASE_PATH', 'http://127.0.0.1/' ); 
define('CONTROL', 'Controllers/');
define('MODALS', 'modals/');

/**
 * Defining Database params
 */
//define('DB_TYPE', 'mysql');
//define('DB_HOST', 'localhost');
//define('DB_NAME', 'clivelive');
//define('DB_USER', 'lmovvt'); 
//define('DB_PASS', 'Lucas/006024');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'clients');
define('DB_USER', 'lmovvt'); 
define('DB_PASS', 'Lucas/006024');

/*
 * Messages of 
 */
define('CHECK_OPERATION_FAIL', 'Sorry, but the operation did not work, please check your data and try again.');
define('ZERO_ROW', 'Zero results were found, please try again.');
define('QUERY_FAIL', 'The operation fail, please try again.');
define('INVALID_REQUEST', 'Invalid request, check your data and try again.');        
define('SUCCESS_MESSAGE', 'It was a success, thank you!');

/**
 * Variable values
 */
define('HOME_SEARCH_URL', BASE_PATH . "home/searchData/*VAR*");
define('DETAIL_SEARCH_URL', BASE_PATH . "search/getByIngredients/*VAR*");


/*
 * JavaScript
 */
define('GOOGLE_MAPS_KEY', "AIzaSyAmL8DoM3wIr-sDnRbwxFZvK3x67N3pQco");
