<?php

if (!defined("COMP")) {
    require 'config/defines.php';
}

spl_autoload_register(function ($class) {
    require COMP . $class . EXT;
});

//$options_ = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    //        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  //          PDO::ATTR_EMULATE_PREPARES => false];

//$qb = new PtcQueryBuilder(new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, $options_));

//phpinfo();

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => DB_TYPE,
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASS,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//$capsule::connection()->setFetchMode(PDO::FETCH_ASSOC);

//PDO::FETCH_OBJ is the Default

/**
* Convert strings with underscores into CamelCase
*
* @param    string    $string    The string to convert
* @param    bool    $first_char_caps    camelCase or CamelCase
* @return    string    The converted string
*
*/
function underscoreToCamelCase( $string, $first_char_caps = false)
{
    if( $first_char_caps == true )
    {
        $string[0] = strtoupper($string[0]);
    }
    $func = create_function('$c', 'return strtoupper($c[1]);');
    return preg_replace_callback('/_([a-z])/', $func, $string);
}



//$array = $capsule->table("bar")->get()[0];
//$file = fopen("bar.php", "w");
//
//$string = "<?php ".PHP_EOL.PHP_EOL."/**".PHP_EOL."* Class name Bar".PHP_EOL."*/".PHP_EOL."class Bar { ".PHP_EOL;
//foreach ($array as $key => $value) {
//    $key_ = Toolbox::findIn($key, "_") ? underscoreToCamelCase($key) : $key;
//    $string .= "\t".PHP_EOL;
//    $string .= "\t/**".PHP_EOL;
//    $string .= "\t* @var String ".PHP_EOL;
//    $string .= "\t* @acess public ".PHP_EOL;
//    $string .= "\t*/ ".PHP_EOL;
//    $string .= "\tpublic $".$key_."; ".PHP_EOL;
//}
//$string .= PHP_EOL."\tpublic function __construct() { ".PHP_EOL;
//$string .= PHP_EOL."\t}".PHP_EOL;
//$string .= "}";
//
//fwrite($file, $string);


$app = new Bootstrap();

$app->Init();