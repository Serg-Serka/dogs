<?php
// autoloader for classes
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
//    echo PHP_EOL . $className . PHP_EOL;
    require $className . '.php';
});