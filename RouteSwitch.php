<?php

abstract class RouteSwitch
{
    protected function inicio()
    {
        require __DIR__ . '/src/view/inicio/index.php';
    }

    protected function denuncia()
    {
        require __DIR__ . '/src/view/faleConosco/index.php';
    }

    protected function contato()
    {
        require __DIR__ . '/src/view/denuncia/index.php';
    }

    protected function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/src/view/faleConosco/index.php';
    }
}