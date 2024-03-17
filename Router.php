<?php
if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /inicio');
    exit();
}
require_once __DIR__ . '/RouteSwitch.php';

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);

        if ($route === '') {
            $this->home();
        } else {
            $this->$route();
        }
    }
}