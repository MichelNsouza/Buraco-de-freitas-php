<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Fale Conosco</title>
  <link href="/../componentes/global.css" rel="stylesheet" type="text/css"/>
</head>

<body>

  <?php include_once __DIR__."/../componentes/header.php";?>

  <main class="main main-faleConosco">
    
    <h1 class="titulo">
      Fale Conosco
    </h1>
    
    <form action="/enviar" method="post" class="formulario">

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
      <div class="form-grupo">
        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
      </div
        
      <div class="form-grupo">
        <input class="form-botao" type="submit" value="Enviar">
      </div>
      
    </form>

  </main>

  <?php include_once __DIR__."/../componentes/footer.php";?>

</body>
</html>
