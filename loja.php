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

$professor_nome = htmlspecialchars($_SESSION['nome']);
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
						<h3 class="segment-title left">Eletrônicos</h3> <!-- Categoria  -->
					</div>
					<div class="col-6-sm right">
						<a href="#" class="btn btn-primary1">Populares <alt="Ícone dropdown"></a>
					</div>
				</div>

				<!-- Grade de produtos -->
				<div class="row">
					<div class="col-6-sm">
						<div class="product">
							<img src="https://i.pinimg.com/originals/ad/93/b2/ad93b255e78fba7030ef006a2d310315.png" alt="Fone de ouvido">
							<div class="detail">
								<h4 class="name">Fones de ouvido</h4> <!-- Nome do produto  -->
								<div class="detail-footer">
									<div class="price left">R$66,99</div> <!-- Preço formatado -->
									<div class="review right"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas de avaliação">4,3</div>
								</div>
							</div>
							<div class="star"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas"></div>
						</div>
					</div>
					<div class="col-6-sm">
						<div class="product">
							<img src="https://pngimg.com/uploads/gamepad/gamepad_PNG54.png" alt="Controlador de jogo">
							<div class="detail">
								<h4 class="name">Controle</h4> <!-- Nome do produto  -->
								<div class="detail-footer">
									<div class="price left">R$116,99</div> <!-- Preço formatado -->
									<div class="review right"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas de avaliação">4,5</div>
								</div>
							</div>
							<div class="star"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas"></div>
						</div>
					</div>
				</div>

				<!-- Título da categoria -->
				<div class="row margin-vertical">
					<div class="col-6-sm">
						<h3 class="segment-title left">Fones de ouvido sem fio</h3> <!-- Categoria  -->
					</div>
					<div class="col-6-sm right">
						<a href="#" class="btn btn-primary">Categoria <img src="https://design-fenix.com.ar/codepen/ui-store/dropdown.png" alt="Ícone dropdown"></a>
					</div>
				</div>

				<!-- Produto em destaque -->
				<div class="row">
					<div class="col-12">
						<div class="featured-product">
							<div class="content-img">
								<img src="https://design-fenix.com.ar/codepen/ui-store/earbuds.png" alt="Fones de ouvido sem fio Beams Pro">
							</div>
							<div class="product-detail">
								<h4 class="product-name">Fones Beams Pro</h4> <!-- Nome do produto  -->
								<p class="price">R$89,00</p> <!-- Preço formatado -->
							</div>
							<div class="star"><img src="https://design-fenix.com.ar/codepen/ui-store/stars.png" alt="Estrelas de avaliação"><span class="review">4,5</span></div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	
</body>

</html>
