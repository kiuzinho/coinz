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

// Consulta os produtos disponíveis na loja
$produtosStmt = $pdo->query("SELECT * FROM Produtos");
$produtos = $produtosStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Loja</title>
	<!-- Link para o arquivo CSS -->
	<link rel="stylesheet" href="asset/loja.css">
</head>

<body>
	<div id="wrapper">
		<!-- Cabeçalho -->
		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-4-sm"><a href="#" class="btn"><i class="gg-layout-grid"></i></a></div>
					<div class="col-4-sm center">
						<h1 class="page-title">Loja</h1> <!-- Título  -->
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
								<img src="https://design-fenix.com.ar/codepen/ui-store/speaker.png" alt="Imagem do produto principal">
							</div>
							<div class="card-content">
								<h3>Olá, <?= htmlspecialchars($aluno['nome']); ?>.</h3> 
								<p>Explore seus prêmios</p> <!-- Descrição  -->
								<div class="content-input">
									<i class="gg-search"></i>
									<input type="text" placeholder="Pesquisar"> <!-- Placeholder  -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Título da categoria -->
				<div class="row margin-vertical">
					<div class="col-6-sm">
						<h3 class="segment-title left">Populares</h3> <!-- Categoria  -->
					</div>

				</div>

				<!-- Grade de produtos -->
				
				<div class="row">
				<?php foreach ($produtos as $produto): ?>
					<div class="col-6-sm">
						<div class="product">
						<img src="<?= htmlspecialchars($produto['imagem']); ?>" alt="<?= htmlspecialchars($produto['nome']); ?>">
							<div class="detail">
								<h4 class="name"><?= htmlspecialchars($produto['nome']); ?></h4> <!-- Nome do produto  -->
								<div class="detail-footer">
									<div class="price left"><?= htmlspecialchars($produto['descricao']); ?></div> <!-- Preço formatado -->
									<div class="review right"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Moedas"><?= number_format($produto['moeda']); ?> moedas</div>
								</div>
							</div>
							<div class="star"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas"></div>
						</div>
					</div>
				<?php endforeach; ?>
				

</body>

</html>
