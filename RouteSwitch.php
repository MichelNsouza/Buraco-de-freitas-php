<?php

// Verifica se a URL atual é a raiz do site
if ($_SERVER['REQUEST_URI'] === '/') {
    // Redireciona para a página inicial
    header('Location: /inicio');
    exit();
}

// Se a URL não for a raiz, continua o roteamento normal

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

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/src/view/faleConosco/index.php';
    }
}
