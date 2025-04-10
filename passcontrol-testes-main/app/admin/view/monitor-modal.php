<?php

require "../../DB/Database.php";

$db = new Database();
$conn = $db->conecta();

$query_primeiro = "SELECT nome FROM usuario ORDER BY id_usuario ASC LIMIT 1";
$stmt_primeiro = $conn->query($query_primeiro);
$primeiro_usuario = $stmt_primeiro->fetch(PDO::FETCH_ASSOC);

$query_4seguintes = "SELECT nome FROM usuario ORDER BY id_usuario ASC LIMIT 4 OFFSET 1";
$stmt_4seguintes = $conn->query($query_4seguintes);
$usuarios_seguintes = $stmt_4seguintes->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="area-monitor-modal">
    <div class="area-modal" id="modalMonitor">
        <div class="modal-fundo">
            <div class="fundo-lateral">
                <h1>Últimas Chamadas</h1>
                <div class="area-das-senhas">
                    <?php foreach ($usuarios_seguintes as $user):?>
                    <div class="caixa-das-senhas">
                        <h2><?= $user['nome']; ?></h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA</h3>
                                <h4>CM 001</h4>
                            </div>
                            <div class="guiche">
                                <h5>GUICHE</h5>
                                <h6>1</h6>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="fundo-principal">
                <div class="area-botao-fechar-monitor">
                    <div class="botao-fechar-monitor" id="fecharMonitor">
                        <h2>X</h2>
                    </div>
                </div>
                <div class="fundo-senha-principal">
                    <div class="caixa-senha-principal">
                        <div class="conjunto-senha-principal">
                            <div class="nome-pessoa">
                                <h1><?= $primeiro_usuario['nome']; ?></h1>
                            </div>
                            <div class="infos-senha-principal">
                                <h2>SERVIÇO:<span>IPTU</span></h2>
                                <h2>SENHA:<span>CM 001</span></h2>
                                <h2>GUICHÊ:<span>1</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>