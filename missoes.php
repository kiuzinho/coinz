<?php
require 'db.php'; // Inclui a conexão com o banco de dados

// Verifica se o ID do aluno foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do aluno não fornecido.");
}

$aluno_id = (int) $_GET['id'];
$id = (int) $_GET['id'];

// Recupera a turma do aluno
$stmt_turma = $pdo->prepare("
    SELECT t.id AS turma_id
    FROM alunos_turmas at
    JOIN turmas t ON at.turma_id = t.id
    WHERE at.aluno_id = :aluno_id
");
$stmt_turma->execute([':aluno_id' => $aluno_id]);
$turma = $stmt_turma->fetch(PDO::FETCH_ASSOC);

if (!$turma) {
    die("O aluno não está associado a nenhuma turma.");
}

$turma_id = $turma['turma_id'];

// Consulta as missões disponíveis para o aluno
$stmt = $pdo->prepare("
    SELECT * 
    FROM missoes 
    WHERE status = 'ativa' AND (turma_id = :turma_id OR turma_id IS NULL)
");
$stmt->execute([':turma_id' => $turma_id]);
$missoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT id, nome, moedas, avatar, xp_atual, xp_total, nivel FROM alunos WHERE id = :id");
$stmt->execute([':id' => $id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

function calcularNivelEProgresso($xp_total) {
    $nivel = 1;
    $xp_para_proximo_nivel = 100; // XP inicial necessário para o nível 1
    
    // Itera para encontrar o nível atual
    while ($xp_total >= $xp_para_proximo_nivel) {
        $xp_total -= $xp_para_proximo_nivel;
        $nivel++;
        $xp_para_proximo_nivel = 100 + ($nivel - 1) * 50; // Fórmula do XP por nível
    }

    // Retorna o nível, XP atual dentro do nível, e o XP necessário para o próximo nível
    return [
        'nivel' => $nivel,
        'xp_atual_no_nivel' => $xp_total,
        'xp_para_proximo_nivel' => $xp_para_proximo_nivel
    ];
}

// Dados do banco
$xp_total = (int) $aluno['xp_total'];

// Calcular nível e progresso
$dados = calcularNivelEProgresso($xp_total);
$nivel_atual = $dados['nivel'];
$xp_atual_no_nivel = $dados['xp_atual_no_nivel'];
$xp_para_proximo_nivel = $dados['xp_para_proximo_nivel'];

// Calcular progresso
$progresso = ($xp_para_proximo_nivel > 0) ? ($xp_atual_no_nivel / $xp_para_proximo_nivel) : 0;
$progresso_percentual = round($progresso * 100, 2);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/louja.css">
    <link rel="stylesheet" href="asset/button.css">
    <title>Missões</title>
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
                @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
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
        .voltar {
	margin-bottom: 15px;
  font: inherit;
  background-color: #f0f0f0;
  border: 0;
  color: #242424;
  border-radius: 0.5em;
  font-size: 1.35rem;
  padding: 0.375em 1em;
  font-weight: 600;
  text-shadow: 0 0.0625em 0 #fff;
  box-shadow: inset 0 0.0625em 0 0 #f4f4f4, 0 0.0625em 0 0 #efefef,
    0 0.125em 0 0 #ececec, 0 0.25em 0 0 #e0e0e0, 0 0.3125em 0 0 #dedede,
    0 0.375em 0 0 #dcdcdc, 0 0.425em 0 0 #cacaca, 0 0.425em 0.5em 0 #cecece;
  transition: 0.15s ease;
  cursor: pointer;
}
.voltar:active {
  translate: 0 0.225em;
  box-shadow: inset 0 0.03em 0 0 #f4f4f4, 0 0.03em 0 0 #efefef,
    0 0.0625em 0 0 #ececec, 0 0.125em 0 0 #e0e0e0, 0 0.125em 0 0 #dedede,
    0 0.2em 0 0 #dcdcdc, 0 0.225em 0 0 #cacaca, 0 0.225em 0.375em 0 #cecece;
}
.coin-font {
    font-family: "Press Start 2P", cursive; /* Altere a fonte aqui */
    font-size: 1.2em; /* Ajuste o tamanho da fonte */
    color: gold; /* Altere a cor, se necessário */
}
.xp-font {
    font-family: "Press Start 2P", cursive; /* Altere a fonte aqui */
    font-size: 1.2em; /* Ajuste o tamanho da fonte */
    color: yellow; /* Altere a cor, se necessário */
}
.coins {
            align-items: center;
            font-size: 1.2em;
            padding-right: 20px;
        }
.coins img {
            width: 24px;
        }

    </style>
</head>
<body>
<!-- Please ❤ this if you like it! -->
<!-- Follow Me https://codepen.io/designfenix -->

<div id="wrapper">
    
<header>
    <div class="header-container">
        <!-- Botão de voltar -->
        <button class="voltar" onclick="window.location.href='aluno.php?id=<?= $aluno['id']; ?>'"><</button>
        
        <!-- Contador de moedas -->
        <div class="coins">
            <img src="asset/img/coin.gif" alt="Moeda">
            <span class="coin-font"><?= htmlspecialchars($aluno['moedas'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        
        <div class="coins">
            <img src="asset/img/xp.gif" alt="Moeda">
            <span class="xp-font"><?= htmlspecialchars($aluno['xp_total'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
    </div>
        
    <div class="container-fluid">
        <div class="row">
            <div class="range" style="--p:<?= $progresso; ?>">
                <div class="range__label">Missões</div>
            </div>
        </div>
    </div>
    <br>
</header>


	<section>
		<div class="container-fluid">
			<!-- HERO CARD -->
			<div class="row">
				<div class="col-12">
                <div class="col-6-sm">
					<h3 class="segment-title left">Missões disponíveis</h3>
				</div>
                <?php if (!empty($missoes)): ?>
    <?php foreach ($missoes as $missao): ?>
        <div class="hero-card">
            <div class="card-content">
                <h3><?= htmlspecialchars($missao['nome']); ?></h3>
                <p><?= htmlspecialchars($missao['descricao']); ?></p>
                
                <button class="gradient-button" onclick="window.location.href='realizar_missao.php?aluno_id=<?= $aluno_id; ?>&missao_id=<?= $missao['id']; ?>';">
                    <span>Realizar Missão</span>
                </button>

                
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhuma missão disponível no momento.</p>
<?php endif; ?>

				</div>
			</div>

</body>
</html>
