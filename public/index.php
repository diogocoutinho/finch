<?php

use App\Interfaces\Http\Router;

require_once __DIR__ . '/../vendor/autoload.php';

phpinfo();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();