<?php

require_once __DIR__ . '/../src/route/Router.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);

?>