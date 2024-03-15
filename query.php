<?php

require_once 'conexao.php';

$pdo = Conexao::getConnection();,

//Consulta SQL para criar a tabela


$sql = "CREATE TABLE IF NOT EXISTS denuncias (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    local VARCHAR(255) NOT NULL,
    ponto_ref VARCHAR(255) NOT NULL,
    foto VARCHAR(255) NOT NULL
    );
";

//apagar
//$sql = "DROP TABLE  denuncias";

// Tentativa de execução da consulta
try {
    $pdo->exec($sql);
    echo "Tabela criada com sucesso.";
} catch (PDOException $e) {
    die("Erro ao criar a tabela: " . $e->getMessage());
}
/*
{
  "functions": {
    "api/*.php": {
      "runtime": "vercel-php@0.7.0"
    }
  },
  "routes": [
    { "src": "/api/(.*)", "dest": "/api/$1" },
    { "src": "/css/(.*)", "dest": "/css/$1" },
    { "src": "/img/(.*)", "dest": "/img/$1" },
    { "src": "/js/(.*)", "dest": "/js/$1" },
    { "src": "/uploads/(.*)", "dest": "/uploads/$1" },
    { "src": "/componentes/(.*)", "dest": "/componentes/$1" },
    { "src": "/src/view/(denuncia|faleConosco|inicio)/(.*)", "dest": "/src/view/$1/$2" },
    { "src": "/src/(controller|model|repositorio)/(.+\\.php)", "dest": "/src/$1/$2" },
    { "src": "/(.*)", "dest": "/index.php" }
  ]
}

*/
?>
