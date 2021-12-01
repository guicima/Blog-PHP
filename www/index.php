<?php

function Autoloader($class_name)
{
    if (file_exists('./classes/' . $class_name . '.php')) {
        require_once './classes/' . $class_name . '.php';
    } else if (file_exists('./Controllers/' . $class_name . '.php')) {
        require_once './Controllers/' . $class_name . '.php';
    } else if (file_exists('./Models/' . $class_name . '.php')) {
        require_once './Models/' . $class_name . '.php';
    }
};

spl_autoload_register('Autoloader');

require_once('Utilities.php');

require_once('Routes.php');
