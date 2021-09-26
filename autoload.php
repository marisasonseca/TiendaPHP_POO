<?php

function controllerAutoload($className)
{
    include "controllers/{$className}.php";
}

spl_autoload_register('controllerAutoload');