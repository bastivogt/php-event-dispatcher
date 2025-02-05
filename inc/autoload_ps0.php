<?php

function autoload($className)
{
    $file = str_replace("\\", "/", $className);
    if (file_exists("./inc/$file.php")) {
        require_once "./inc/$file.php";
    }
}
spl_autoload_register("autoload");
