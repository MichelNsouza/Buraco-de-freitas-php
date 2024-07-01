<?php
require_once(__DIR__ . "/../../repositorio/conexao.php");

$pdo = Conexao::getConnection();
$stmt = $pdo->query('SELECT * FROM denuncias');
$denuncias = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt">
  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Buraco de Freitas</title>
  <link href="/../../../public/css/global.css" rel="stylesheet" type="text/css"/>
</head>
  
<body>
  <?php include_once __DIR__ ."/../../../componentes/header.php";?>
  
  <?php
  if(isset($_GET['mensagem']) && $_GET['mensagem'] == 'sucesso') {
      echo '<div class="alert alert-success" role="alert">Denuncia registrada com sucesso!</div>';
  }
  ?>

  <main class="main">

    <section class="banner">

      <h1 class="banner-titulo">Encontrou um buraco em Lauro de Freitas?</h1>

      <a href="/denuncia" class="banner-link">
        <img src="/../../../public/img/banner/icone-banner.svg" class="#" />
        Denuncie agora mesmo!
      </a>

    </section>

    <section class="registros">
      
      <h2 class="titulo">Últimos registros</h2>

      <?php foreach($denuncias as $denuncia): ?>
        <article class="registros-denuncia">

            <img src="/../../../public/uploads/<?=$denuncia->foto?>" class="registros-denuncia-img">
            <p class="registros-denuncia-endereco">
                <?= $denuncia->local ?>
            </p>
            <p class="registros-denuncia-referencia">
                <?= $denuncia->ponto_ref ?>
            </p>
            <p class="registros-denuncia-periodo">
                <?= $denuncia->data_hora ?>
            </p>
            <p class="registros-denuncia-reporte">
                Não está mais lá? <a href="/contato">Reporte!</a>
            </p>
        </article>
      <?php endforeach; ?>
    </section>

    <section class="ranking">

      <h2 class="titulo">Ranking de Março de 2024</h2>

      <table class="ranking-tabela">

        <thead class="ranking-tabela-cabeca">
          <tr class="ranking-tabela-cabeca-cabecalho">
            
            <th class="ranking-tabela-cabeca-cabecalho-nome">
              Nome
            </th>
            <th class="ranking-tabela-cabeca-cabecalho-denuncia">
              Denuncias
            </th>
            <th class="ranking-tabela-cabeca-cabecalho-posicao">
              Posição
            </th>
            
          </tr>
        </thead>

        <tbody class="ranking-tabela-corpo">
          
          <tr class="ranking-tabela-corpo-linha">
            <td class="ranking-tabela-corpo-linha-nome"><b>João Joaquim Silva e Santos</b></td>
            <td class="ranking-tabela-corpo-linha-posicao">722</td>
            <td class="ranking-tabela-corpo-linha-icone">
              <img src="/../../../public/img/ranking/ouro.svg">
            </td>
          </tr>

          <tr class="ranking-tabela-corpo-linha">
            <td class="ranking-tabela-corpo-linha-nome"><b>João Joaquim Silva e Santos</b></td>
            <td class="ranking-tabela-corpo-linha-posicao">722</td>
            <td class="ranking-tabela-corpo-linha-icone">
              <img src="/../../../public/img/ranking/prata.svg">
            </td>
          </tr>

          <tr class="ranking-tabela-corpo-linha">
            <td class="ranking-tabela-corpo-linha-nome"><b>João Joaquim Silva e Santos</b></td>
            <td class="ranking-tabela-corpo-linha-posicao">722</td>
            <td class="ranking-tabela-corpo-linha-icone">
              <img src="/../../../public/img/ranking/bronze.svg">
            </td>
          </tr>
           
        </tbody>
      </table>

    </section>

  </main>

  <?php include_once __DIR__."/../../../componentes/footer.php";?>

</body>
</html>
