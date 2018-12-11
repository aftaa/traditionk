<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once 'mvc/autoload.php';

new \mvc\App(include('app/config/config.php'));