<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 06.12.2018
 * Time: 17:26
 */

spl_autoload_register(
    function ($className) {
    $className = str_replace('\\', '/', $className);
    $classFile = "$className.php";
    require_once $classFile;
});

if (PHP_VERSION < '7.1') {
    echo 'Необходима версия PHP не ниже 7.1';
    die();
}