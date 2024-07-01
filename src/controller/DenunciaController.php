<?php

class DenunciaController
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function CreateObjDenuncia($dados)
    {
        return new Denuncia(
            $dados['id'],
            $dados['nome'],
            $dados['email'],
            $dados['local'],
            $dados['ponto_ref'],
            $dados['foto']
        );
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM denuncias";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todasAsDenuncias = array_map(function ($denuncia) {
            return $this->CreateObjDenuncia($denuncia);
        }, $dados);

        return $todasAsDenuncias;
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM denuncias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->CreateObjDenuncia($dados);
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM denuncias WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function salvar(Denuncia $denuncia)
    {
        $sql = "INSERT INTO denuncias (nome, email, local, ponto_ref, foto) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $denuncia->getNome());
        $statement->bindValue(2, $denuncia->getEmail());
        $statement->bindValue(3, $denuncia->getLocal());
        $statement->bindValue(4, $denuncia->getPontoRef());
        $statement->bindValue(5, $denuncia->getFoto());
        $statement->execute();
    }

    public function atualizar(Denuncia $denuncia)
    {
        $sql = "UPDATE denuncias SET nome = ?, email = ?, local = ?, ponto_ref = ?, foto = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $denuncia->getNome());
        $statement->bindValue(2, $denuncia->getEmail());
        $statement->bindValue(3, $denuncia->getLocal());
        $statement->bindValue(4, $denuncia->getPontoRef());
        $statement->bindValue(5, $denuncia->getFoto());
        $statement->bindValue(6, $denuncia->getId());
        $statement->execute();
    }
}
?>