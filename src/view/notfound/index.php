<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Algo deu errado!</title>
  <link href="/../public/css/global.css" rel="stylesheet" type="text/css"/>
  <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          flex-direction: column;
      }
      h1 {
          font-size: 3em;
          margin-bottom: 10px;
      }
      p {
          font-size: 1.2em;
          color: #666;
      }
      a {
          color: #007bff;
          text-decoration: none;
          font-weight: bold;
      }
  </style>
</head>

<body>

  <?php include_once __DIR__ ."/../../../componentes/header.php";?>

  <main class="main">

    <div>
        <h1>404 - Página não encontrada</h1>
      
        <p>A página que você está procurando pode ter sido removida ou não está disponível temporariamente.</p>
      
        <p>Por favor, verifique o endereço digitado 
          <br>
           <br>
           <br>
          <br>
        <a href="/"> volte para a página inicial</a>
          <br>
          ou 
          <br>
        <a href="/contato">entre em contato</a> com o suporte técnico.
    </p>
    </div>
  </main>

   <?php include_once __DIR__."/../../../componentes/footer.php";?>
</body>
</html>
