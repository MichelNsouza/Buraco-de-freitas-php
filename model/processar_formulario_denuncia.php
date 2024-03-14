<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $local = $_POST['local'];
    $ponto_ref = $_POST['ponto_ref'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $uploadDir =  __DIR__.'/uploads'; // Diretório onde a imagem será armazenada
        $uploadFile = $uploadDir . basename($_FILES['foto']['name']); // Caminho completo para o arquivo

        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
            // Configurações de conexão com o banco de dados
            require_once 'conexao.php';
            $pdo = Conexao::getConnection();

            // Insere os dados no banco de dados
            $sql = "INSERT INTO denuncias (nome, email, local, ponto_ref, foto) VALUES (:nome, :email, :local, :ponto_ref, :foto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':local', $local);
            $stmt->bindParam(':ponto_ref', $ponto_ref);
            $stmt->bindParam(':foto', $uploadFile);
            $stmt->execute();

          header("Location: /../denuncia/index.php?mensagem=sucesso");
          exit;
          
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Nenhum arquivo enviado ou erro no envio.";
    }
} else {
    // Se os dados não foram enviados via POST, redirecionar para o formulário
    header("Location: /../denuncia/index.php");
    exit;

}
?>
