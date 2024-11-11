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
$xp_atual = 68; // Substitua com valor real se necessário
$xp_total = 100;
$nivel = 10;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .header .shop-btn {
            background: #6A5ACD;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            font-size: 1em;
        }

        .content h1 {
            margin-top: 20px;
            font-size: 2em;
        }

        .avatar {
            margin: 30px auto;
            width: 200px;
            position: relative;
            animation: fadeIn 1s ease-out; /* Animação de entrada */
        }

        .avatar img {
            width: 100%;
            animation: float 3s infinite ease-in-out; /* Movimento de flutuação */
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

        .progress-bar {
            margin: 20px auto;
            width: 80%;
            height: 20px;
            background: #2E4053;
            border-radius: 50px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-inner {
            height: 100%;
            width: <?= ($xp_atual / $xp_total) * 100; ?>%; /* Calcula o progresso */
            background: #00FFAB;
            transition: width 0.5s;
        }

        .progress-text {
            position: absolute;
            width: 100%;
            text-align: center;
            top: 0;
            color: white;
            font-size: 0.9em;
            line-height: 20px;
        }

        .footer {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .footer button {
            background: #6A5ACD;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s;
        }

        .footer button:hover {
            background: #5349D3;
        }

        .welcome {
            font-size: 1.8em;
            margin: 20px 0;
        }

        .welcome span {
            color: #00FFAB;
            font-weight: bold;
        }

        /* Animações */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <div class="coins">
                <img src="coin.png" alt="Moeda"> <!-- Substitua por um ícone real -->
                <span><?= $aluno['moedas']; ?></span>
            </div>
            <button class="shop-btn">Loja</button>
        </div>

        <!-- Conteúdo -->
        <div class="content">
            <h1>Olá, <?= htmlspecialchars($aluno['nome']); ?>.</h1>
            <div class="avatar">
                <img src="robo.png" alt="Avatar"> <!-- Substitua por um avatar real -->
                <div class="level">NÍVEL <?= $nivel; ?></div>
            </div>
            <div class="progress-bar">
                <div class="progress-bar-inner"></div>
                <div class="progress-text"><?= $xp_atual; ?>/<?= $xp_total; ?></div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <button>Missões</button>
            <button>Ranking</button>
            <button>Atitudes</button>
        </div>
    </div>
</body>
</html>
