<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Denuncie um buraco</title>
  <link href="/public/css/global.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <?php include_once __DIR__ ."/../../../componentes/header.php";?>

  <main class="main">
  
      <h1 class="titulo">
        Faça sua denuncia
      </h1>
    
    <form id="form-denuncia" method="post" class="formulario-denuncia" enctype="multipart/form-data">
      
      <div class="form-grupo-user">
        <div class="form-grupo">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>
        </div>
        
        <div class="form-grupo">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
      </div>
      
      <div class="form-grupo-denuncia">
        <div class="form-grupo">
          <label for="local">Local:</label><br>
          <input type="text" id="local" name="local" required>
        </div>
        
        <div class="form-grupo">
          <label for="ponto_ref">Ponto de referencia:</label><br>
          <input type="text" id="ponto_ref" name="ponto_ref" required>
        </div>
      </div>
      
      <div class="form-grupo">
        <label class="imagem-input" for="foto">
          Selecione ou arraste uma imagem:
          <input type="file" id="foto" name="foto" accept="image/*">
        </label>
      </div>
      
      <div class="form-grupo">
        <input type="hidden" name="action" value="processar_denuncia">
        <input class="form-botao-denuncia" type="submit" value="Registrar denuncia">
      </div>
      
    </form>
  </main>

   <?php include_once __DIR__."/../../../componentes/footer.php";?>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
      document.getElementById("form-denuncia").addEventListener("submit", function(event) {
          event.preventDefault(); // Previne o comportamento padrão do formulário

          // Aqui você pode fazer uma requisição AJAX para chamar a função PHP
          // Exemplo com jQuery
          $.ajax({
              url: "src/controller/DenunciaController.php", // Caminho para o arquivo PHP
              type: "POST",
              data: $(this).serialize(), // Dados do formulário
              success: function(response) {
                  // Sucesso, faça algo com a resposta se necessário
                  console.log(response);
              },
              error: function(xhr, status, error) {
                  // Ocorreu um erro, trate-o conforme necessário
                  console.error(xhr.responseText);
              }
          });
      });
</script>
</body>
</html>
