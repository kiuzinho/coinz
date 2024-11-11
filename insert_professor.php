<?php
require 'db.php'; // Inclui a conexão com o banco de dados

// Dados do professor de teste
$nome = "Professor Teste";
$email = "professor@teste.com";
$senha = "teste123"; // Senha original fornecida pelo professor

// Criptografa a senha usando password_hash
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

try {
    // Insere o professor no banco de dados
    $stmt = $pdo->prepare("INSERT INTO professores (nome, email, senha) VALUES (:nome, :email, :senha)");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha_hash
    ]);
    echo "Professor inserido com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir professor: " . $e->getMessage();
}
?>
