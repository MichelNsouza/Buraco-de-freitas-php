<?php
abstract class RouteSwitch
{
    protected function inicio()
    {
      require "view/inicio/index.php";
    }

  protected function denuncia()
  {
      require __DIR__ . '/../../view/denuncia/index.php';
  }

    protected function contato()
    {
        require __DIR__ . '/../../view/faleConosco/index.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/../../view/faleConosco/index.php';
    }
}

