<?php
require_once "config.php";
require_once "helpers/errors.php";

function autoload_class($class)
{

    require_once "classes/" . $class . ".php";
}

spl_autoload_register('autoload_class');
