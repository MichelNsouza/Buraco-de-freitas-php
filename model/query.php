<?php

require_once 'conexao.php';

$pdo = Conexao::getConnection();

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

?>
