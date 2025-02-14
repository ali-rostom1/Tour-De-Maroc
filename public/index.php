<?php
require_once '../vendor/autoload.php';

use Core\Router;

$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);
$router = new Router($uri);

