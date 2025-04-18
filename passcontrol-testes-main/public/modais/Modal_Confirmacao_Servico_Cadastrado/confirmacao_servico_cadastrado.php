<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="./confirmacao_servico_cadastrado.css">
</head>
<body class="body">
    <button class="botao-modal-confirmacao-servico-cadastrado open">Abrir Modal</button>


    <div class="fundo-container-confirmacao-servico-cadastrado">
        <section class="modal-confirmacao-servico-cadastrado">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-confirmacao-servico-cadastrado">
            <h1 class="titulo-confirmacao-servico-cadastrado">Confirmação</h1>
            <hr class="linha-confirmacao-servico-cadastrado">
            <p class="texto-confirmacao-servico-cadastrado"><b>Deseja Salvar o Serviço Cadastrado?</b></p>
            <div class="button-group-confirmacao-servico-cadastrado">
                <button class="botao-modal-confirmacao-servico-cadastrado cancel">Não</button>
                <button class="botao-modal-confirmacao-servico-cadastrado save">Sim</button>
            </div>
        </section>
    </div>
    <script src="./confirmacao_servico_cadastrado.js"></script>
</body>
</html>