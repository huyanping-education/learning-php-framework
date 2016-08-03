<?php
/**
 * Created by PhpStorm.
 * User: huyanping
 * Date: 16/8/2
 * Time: 下午5:19
 */

//function __autoload($classname) {
//    $filename = __DIR__ . DIRECTORY_SEPARATOR . $classname . '.php';
//    if(file_exists($filename)) {
//        include $filename;
//    }
//}

function __autoload($classname)
{
    $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    if (strstr($classname, "\\Jenner\\SimpleFork\\") === 0) {
        $file = $dir . basename(str_replace('\\', '/', $classname)) . '.php';
        if (file_exists($file)) require $file;
    }
}

spl_autoload_register(function ($classname) {
    $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    if (strstr($classname, "\\Jenner\\SimpleFork\\") === 0) {
        $file = $dir . basename(str_replace('\\', '/', $classname)) . '.php';
        if (file_exists($file)) require $file;
    }
});