<?php
session_start();
require '../db.php'; // Conexão com o banco

// Verifica se o professor está logado
if (!isset($_SESSION['professor_id'])) {
    header("Location: login.php");
    exit();
}

// Inicializa variáveis
$alunos = [];
$erro = "";

// Processa a pesquisa do professor
if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE nome LIKE :pesquisa");
    $stmt->execute([':pesquisa' => "%$pesquisa%"]);
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($alunos)) {
        $erro = "Nenhum aluno encontrado com o nome '$pesquisa'.";
    }
}

// Adiciona/remova moedas se o professor clicar em uma ação
if (isset($_POST['aluno_id']) && isset($_POST['valor'])) {
    $aluno_id = (int) $_POST['aluno_id'];
    $valor = (int) $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Atualiza o saldo do aluno
    $stmt = $pdo->prepare("UPDATE alunos SET moedas = moedas + :valor WHERE id = :id");
    $stmt->execute([':valor' => $valor, ':id' => $aluno_id]);

    // Registra a transação
    $stmt = $pdo->prepare("INSERT INTO transacoes (aluno_id, professor_id, valor, descricao) VALUES (:aluno_id, :professor_id, :valor, :descricao)");
    $stmt->execute([
        ':aluno_id' => $aluno_id,
        ':professor_id' => $_SESSION['professor_id'],
        ':valor' => $valor,
        ':descricao' => $descricao
    ]);

    // Mensagem de sucesso (opcional)
    header("Location: professor_dashboard.php?pesquisa=$pesquisa");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Professor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        .erro {
            color: red;
        }
        .aluno {
            margin-bottom: 20px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            margin-right: 5px;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .actions {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Painel do Professor</h1>

    <form method="GET" action="professor_dashboard.php">
        <label for="pesquisa">Pesquisar Aluno:</label>
        <input type="text" id="pesquisa" name="pesquisa" placeholder="Digite o nome do aluno" required>
        <button type="submit">Pesquisar</button>
    </form>

    <?php if (!empty($erro)): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <?php foreach ($alunos as $aluno): ?>
        <div class="aluno">
            <h3><?= htmlspecialchars($aluno['nome']) ?> (ID: <?= $aluno['id'] ?>)</h3>
            <p>Saldo Atual: <?= $aluno['moedas'] ?> moedas</p>
            <div class="actions">
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                    <input type="hidden" name="valor" value="5">
                    <input type="hidden" name="descricao" value="Fez a atividade">
                    <button type="submit">Fez a atividade [5+]</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                    <input type="hidden" name="valor" value="5">
                    <input type="hidden" name="descricao" value="Fez a atividade">
                    <button type="submit">Coisa boa [5+]</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                    <input type="hidden" name="valor" value="-10">
                    <input type="hidden" name="descricao" value="Conversou na aula">
                    <button type="submit" style="background-color: #FF5733;">Conversou na aula [10-]</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                    <input type="hidden" name="valor" value="-10">
                    <input type="hidden" name="descricao" value="Conversou na aula">
                    <button type="submit" style="background-color: #FF5733;">Coisa ruim [10-]</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
