<?php
use Core\Router;
require_once '../vendor/autoload.php';



$uri = $_SERVER["REQUEST_URI"];
<<<<<<< HEAD
($uri);
=======
// var_dump($uri);
>>>>>>> c1890e1c2da75f068c32ae6755a12cbfa8aa452a
$router = new Router($uri);

