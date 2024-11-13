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
$professor_nome = htmlspecialchars($_SESSION['professor_nome']);

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

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Professor</title>
    <link rel="stylesheet" href="../asset/loja.css"> <!-- Link para o CSS -->
     <link rel="stylesheet" href="../asset/button.css"> <!-- Link para o CSS -->
</head>

<body>
    <div id="wrapper">
        <!-- Cabeçalho -->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4-sm"><a href="logout.php" class="btn">Sair</a></div>
                    <div class="col-4-sm center">
                        <h1 class="page-title">Painel do Professor</h1>
                    </div>
                    <div class="col-4-sm right">
                        <div class="profile"></div>
                    </div>
                </div>
            </div>
        </header>

        <section>
            <div class="container-fluid">
                <!-- Cartão principal -->
                <div class="row">
                    <div class="col-12">
                        <div class="hero-card">
                            <div class="content-image">
                                <img src="../asset/img/professor.png" alt="Imagem do professor">
                            </div>
                            <div class="card-content">
                                <h3>Olá, <?= $professor_nome; ?>!</h3> <!-- Saudação -->
                                <p>Pesquisar aluno</p> <!-- Descrição -->
                                <form method="GET" action="teste.php">
                                    <div class="content-input">
                                        <input type="text" id="pesquisa" name="pesquisa" placeholder="Pesquisar aluno" required>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Título da categoria -->
                <div class="row margin-vertical">
                    <div class="col-6-sm">
                        <h3 class="segment-title left">Lista de Alunos</h3>
                    </div>
                </div>

                <!-- Alunos encontrados -->
                <?php if (!empty($erro)): ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="erro"><?= htmlspecialchars($erro) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <?php foreach ($alunos as $aluno): ?>
                        <div class="col-6-sm">
                            
                            <div class="product">
                            <form method="POST" style="display:inline;">
                            <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                            <input type="hidden" name="valor" value="5">
                            <input type="hidden" name="descricao" value="Fez a atividade">
                            <button class="noselect"><span class="text">-5</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
                </form>
                                <div class="detail">
                                    <h4 class="name"><?= htmlspecialchars($aluno['nome']) ?></h4>
                                    <div class="detail-footer">
                                        <div class="price left">ID: <?= $aluno['id'] ?></div>
                                        <div class="review right"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas de avaliação"><?= $aluno['moedas'] ?> moedas</div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
