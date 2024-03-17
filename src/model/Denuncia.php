<?php

class Denuncia
{
    private ?int $id;
    private string $nome;
    private string $email;
    private string $local;
    private string $ponto_ref;
    private string $foto;

    public function __construct(?int $id, string $nome, string $email, string $local, string $ponto_ref, string $foto)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->local = $local;
        $this->ponto_ref = $ponto_ref;
        $this->foto = $foto;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLocal(): string
    {
        return $this->local;
    }

    public function getPontoRef(): string
    {
        return $this->ponto_ref;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }
}
