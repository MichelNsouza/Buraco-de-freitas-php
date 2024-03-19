<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Denuncie um buraco</title>
  <link href="/../css/global.css" rel="stylesheet" type="text/css"/>
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
        <input class="form-botao-denuncia" type="submit" value="Registrar denuncia">
      </div>
      
    </form>
  </main>

   <?php include_once __DIR__."/../../../componentes/footer.php";?>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
      $('#formulario-denuncia').submit(function(e){
          e.preventDefault(); // Impede o envio padrão do formulário

          $.ajax({
              type: 'post',
              url: '/../../controller/DenunciaController.php', // O caminho para o arquivo PHP
              data: { action: 'processaFormularioDenuncia', formData: new FormData(this) },
              contentType: false,
              processData: false,
              success: function(response) {
                  // Código para tratar a resposta do servidor
                  alert('Formulário enviado com sucesso!');
              },
              error: function() {
                  alert('Erro ao enviar o formulário.');
              }
          });
      });
  });


</script>
  <?php
  require_once  __DIR__."/../../controller/DenunciaController.php";
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['action'] == 'processaFormularioDenuncia') {
          // Chama a função dentro do DenunciaController
          DenunciaController::processaFormularioDenuncia($_POST['formData']);
      }
  }
  ?>
</body>
</html>
