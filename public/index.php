<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura</title>
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/feed.css">
    <script src="/assets/js/script.js"></script>
</head>

<?php
date_default_timezone_set('America/Sao_Paulo');
$arquivoMensagens = "mensagens.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensagem = trim($_POST['mensagem']);
    if (!empty($mensagem)) {
        $dataHora = date("d/m/Y H:i");
        $novaMensagem = "<div class='msg' id='msg-id'>\n\t<div class='user-div'>\n\t\t<img src='../assets/img/user.png' alt='user' class='user'>\n\t\t<div class='user-id'>\n\t\t\t<p>@user_example</p>\n\t\t</div>\n\t</div>\n\t<p class='texto'>" . htmlspecialchars($mensagem) . "</p>\n\t<p class='time'>$dataHora</p>\n</div>\n\n";
        $mensagensAtuais = file_exists($arquivoMensagens) ? file_get_contents($arquivoMensagens) : "";
        $conteudoAtualizado = $novaMensagem . $mensagensAtuais;

        file_put_contents($arquivoMensagens, $conteudoAtualizado, LOCK_EX);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<body>
    <!--Header-->
    <?php include "include/header.php"?>

    <!-- Input de mensagens -->
    <form method="POST" class="formu        ">
        <div class="input-msg">
            <input class="inp" type="text" name="mensagem" placeholder="No que você está pensando hoje?">
            <button type="submit" class="sub">Enviar</button>
        </div>
    </form>

    <!--Mensagens-->
    <div class="dad-msg">
        <?php include "mensagens.php"?>
    </div>

</body>
</html>