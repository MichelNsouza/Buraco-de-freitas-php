<?php 
include_once "src/repositorio/conexao.php";

function processaFormularioDenuncia() {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $local = $_POST['local'];
    $ponto_ref = $_POST['ponto_ref'];

    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $uploadDir = __DIR__ . '/../../public/uploads/';
        $uploadFile = basename($_FILES['foto']['name']);

        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
                $pdo = Conexao::getConnection();
                $sql = "INSERT INTO denuncias (nome, email, local, ponto_ref, foto) VALUES (:nome, :email, :local, :ponto_ref, :foto)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':local', $local);
                $stmt->bindParam(':ponto_ref', $ponto_ref);
                $stmt->bindParam(':foto', $uploadFile);
                $stmt->execute();

                header("Location: /inicio");
                exit;
            } else {
                echo "Erro ao fazer upload do arquivo.";
            }
        } else {
            echo "Arquivo enviado não é uma imagem.";
        }
    } else {
        echo "Nenhum arquivo enviado ou erro no envio.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'processar_denuncia') {
    processaFormularioDenuncia();
}
?>