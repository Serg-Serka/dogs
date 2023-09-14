<?php
// autoloader for classes
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    $className = str_replace('App', '', $className);
    require 'src/' . $className . '.php';
});