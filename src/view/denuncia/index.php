<?php include_once __DIR__ . "/../../../src/controller/processaForm.php"; ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Denuncie um buraco</title>
    <link href="/public/css/global.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php include_once __DIR__ . "/../../../componentes/header.php"; ?>

    <main class="main">
        <h1 class="titulo">Faça sua denuncia</h1>
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

    <?php include_once __DIR__ . "/../../../componentes/footer.php"; ?>
</body>
</html>
