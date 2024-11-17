<?php
require 'db.php'; // Inclui a conexão com o banco de dados

// Verifica se o ID do aluno foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do aluno não fornecido.");
}

$id = (int) $_GET['id'];

// Consulta as informações do aluno
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$stmt->execute([':id' => $id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$aluno) {
    die("Aluno não encontrado.");
}

// Simulando XP e Nível (ajuste conforme necessário)
$xp_atual = 10; // Substitua com valor real se necessário
$xp_total = 100;
$nivel = 10;

// Calcula o progresso
$progresso = ($xp_atual / $xp_total) * 100;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/loja.css">
    <link rel="stylesheet" href="asset/button.css">
    <title>Página do Aluno</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        
        *, *:before, *:after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: radial-gradient(circle, #2A2A72, #009FFD);
            color: white;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .header .coins {
            display: flex;
            align-items: center;
            font-size: 1.2em;
        }

        .header .coins img {
            width: 24px;
            margin-right: 10px;
        }

        .content h1 {
            margin-top: 20px;
            font-size: 2em;
            font-family: "Press Start 2P", cursive; /* Fonte aplicada diretamente ao título */
        }

        .avatar {
            margin: 30px auto;
            width: 200px;
            position: relative;
        }

        .avatar img {
            width: 100%;
        }

        .level {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: #00FFAB;
            border-radius: 50px;
            padding: 5px 15px;
            color: #000;
            font-size: 1em;
            font-weight: bold;
        }

        .range {
            position: relative;
            background-color: #333;
            width: 300px;
            height: 30px;
            margin: 20px auto;
            transform: skew(30deg);
            font-family: 'Orbitron', monospace;
        }

        .range:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #F3E600;
            width: calc(<?= $progresso; ?>%);
            z-index: 0;
        }

        .range:after {
            content: '<?= round($progresso); ?>%';
            color: #000;
            position: absolute;
            left: 5%;
            top: 50%;
            transform: translateY(-50%) skewX(-30deg);
            z-index: 1;
        }

        .range__label {
            transform: skew(-30deg) translateY(-100%);
            line-height: 1.5;
        }
        .footer {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}
.coin-font {
    font-family: "Press Start 2P", cursive; /* Altere a fonte aqui */
    font-size: 1.5em; /* Ajuste o tamanho da fonte */
    color: gold; /* Altere a cor, se necessário */
}
.wrapper-snow {
    width: 420px; /* Largura fixa */
    height: 720px; /* Altura fixa */
    margin: 40px auto; /* Centraliza horizontalmente e cria espaçamento vertical */
    background: #17171f; /* Cor preta como base */
    border-radius: 45px; /* Bordas arredondadas */
    overflow: hidden; /* Para evitar que o conteúdo animado ultrapasse os limites */
    position: relative; /* Para posicionamento absoluto interno funcionar */
    z-index: 1;

    /* Fundo animado com moedas */
    background-image: url('asset/img/3.png'), url('asset/img/1.png'), url('asset/img/2.png');
    background-size: cover; /* Ajusta o tamanho das imagens */
    -webkit-animation: snow 1000s linear infinite;
    -moz-animation: snow 1000s linear infinite;
    -ms-animation: snow 1000s linear infinite;
    animation: snow 1000s linear infinite;
    transform: translate3d(0, 0, 0);
}

/* Animação das moedas */
@keyframes snow {
    0% {
        background-position: 0px 0px, 0px 0px, 0px 0px;
    }
    100% {
        background-position: 50000px 50000px, 10000px 20000px, -10000px 15000px;
    }
}





    </style>
</head>
<body>

<div class="wrapper-snow">
    <!-- Cabeçalho -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4-sm center">
                    <h1 class="page-title">Loja</h1>
                </div>
            </div>
        </div>
    </header>
        
    <div class="container-fluid">
        <!-- Cabeçalho -->
        <div class="header">
        <div class="coins">
    <img src="asset/img/coin.gif" alt="Moeda">
    <span class="coin-font"><?= htmlspecialchars($aluno['moedas'], ENT_QUOTES, 'UTF-8'); ?></span>

</div>

            <a href="loja.php?id=<?= $aluno['id']; ?>" class="btn-link">
                <button type="button" class="btn">
                    <strong>LOJA</strong>
                    <div id="container-stars">
                        <div id="stars"></div>
                    </div>
                    <div id="glow">
                        <div class="circle"></div>
                        <div class="circle"></div>
                    </div>
                </button>
            </a>
        </div>

        <!-- Conteúdo -->
        <div class="content">
            <h1>Olá, <?= htmlspecialchars($aluno['nome'], ENT_QUOTES, 'UTF-8'); ?>!</h1>

            <div class="avatar">
                <img src="asset/img/gif.gif" alt="Avatar">
                
            </div>
            <div class="range" style="--p:<?= $progresso; ?>">
                <div class="range__label">Missões</div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
    <button class="gradient-button"><span>Missões</span></button>
    <button class="gradient-button"><span>Ranking</span></button>
    <button class="gradient-button"><span>Atitudes</span></button>
</div>
    </div>
    </div>
    
</body>
</html>
