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

    private function formarObjeto($dados)
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
            return $this->formarObjeto($denuncia);
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

        return $this->formarObjeto($dados);
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

  public function processaFormularioDenuncia(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $local = $_POST['local'];
        $ponto_ref = $_POST['ponto_ref'];

        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $uploadDir =  __DIR__.'/../uploads/';
            $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
                require_once 'conexao.php';
                $pdo = Conexao::getConnection();
                $sql = "INSERT INTO denuncias (nome, email, local, ponto_ref, foto) VALUES (:nome, :email, :local, :ponto_ref, :foto)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':local', $local);
                $stmt->bindParam(':ponto_ref', $ponto_ref);
                $stmt->bindParam(':foto', $uploadFile);
                $stmt->execute();

              header("Location: /../inicio/index.php?mensagem=sucesso");
              exit;

            } else {
                echo "Erro ao fazer upload do arquivo.";
            }
        } else {
            echo "Nenhum arquivo enviado ou erro no envio.";
        }
    } else {
        header("Location: /../denuncia/index.php");
        exit;
    }
  }
}
?>