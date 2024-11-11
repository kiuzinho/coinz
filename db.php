<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'game';
$username = 'root';
$password = '';

try {
    // Cria a conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibe erro caso a conexão falhe
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
    