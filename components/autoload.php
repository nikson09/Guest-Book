<?php



// function __autoload($class) {
//     include 'classes/' . $class . '.php';
// }

function my_autoloader($class) {
    include ROOT. '/components/' . $class . '.php';

}

spl_autoload_register('my_autoloader');




?>