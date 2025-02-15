<?php
use Core\Router;
require_once '../vendor/autoload.php';



$uri = $_SERVER["REQUEST_URI"];
($uri);
$router = new Router($uri);

