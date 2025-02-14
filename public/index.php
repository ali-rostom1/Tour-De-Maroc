<?php
use Core\Router;
require_once '../vendor/autoload.php';



$uri = $_SERVER["REQUEST_URI"];
$router = new Router($uri);

