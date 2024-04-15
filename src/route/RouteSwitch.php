<?php
abstract class RouteSwitch
{
    protected function inicio()
    {
        require_once  __DIR__ . '/../../src/view/inicio/index.php';
    }

    protected function denuncia()
    {
        require_once  __DIR__ . '/../../src/view/denuncia/index.php';
    }
  
    protected function contato()
    {
        require_once  __DIR__ . '/../../src/view/faleConosco/index.php';
    }
    public function __call($name, $arguments)
    {
        http_response_code(404);
        require_once  __DIR__ . '/../../src/view/notfound/index.php';
    }
}

?>
