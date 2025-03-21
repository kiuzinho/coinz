<?php
session_start();
require 'db.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para buscar o usuário pelo e-mail
    $stmt = $pdo->prepare("SELECT * FROM professores WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verifica a senha fornecida com o hash armazenado no banco
        if (password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            // Armazena o ID do professor na sessão, se o tipo de usuário for "professor"
            if ($usuario['tipo_usuario'] === 'professor') {
                $_SESSION['professor_id'] = $usuario['id']; // Armazena o ID do professor
                header("Location: painel/professor/professor_dashboard.php");
            } elseif ($usuario['tipo_usuario'] === 'secretaria') {
                header("Location: painel/secretaria/paginas/dashboard.php");
            }
            exit();
        } else {
            // Senha inválida
            $erro = "Senha inválida.";
        }
    } else {
        // E-mail não encontrado
        $erro = "E-mail não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Professores</title>
    <style>
        /* O estilo original foi mantido inalterado */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body { background: #ecf0f3; }
        .wrapper { max-width: 350px; min-height: 500px; margin: 80px auto; padding: 40px 30px 30px 30px; background-color: #ecf0f3; border-radius: 15px; box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff; }
        .logo { width: 80px; margin: auto; }
        .logo img { width: 100%; height: 80px; object-fit: cover; border-radius: 50%; box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff; }
        .wrapper .name { font-weight: 600; font-size: 1.4rem; letter-spacing: 1.3px; padding-left: 10px; color: #555; }
        .wrapper .form-field input { width: 100%; display: block; border: none; outline: none; background: none; font-size: 1.2rem; color: #666; padding: 10px 15px 10px 10px; }
        .wrapper .form-field { padding-left: 10px; margin-bottom: 20px; border-radius: 20px; box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff; }
        .wrapper .form-field .fas { color: #555; }
        .wrapper .btn { box-shadow: none; width: 100%; height: 40px; background-color: #03A9F4; color: #fff; border-radius: 25px; box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff; letter-spacing: 1.3px; }
        .wrapper .btn:hover { background-color: #039BE5; }
        .wrapper a { text-decoration: none; font-size: 0.8rem; color: #03A9F4; }
        .wrapper a:hover { color: #039BE5; }
        @media(max-width: 380px) { .wrapper { margin: 30px 20px; padding: 40px 15px 15px 15px; } }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="asset/img/Logo500.ico" alt="">
        </div>
        <div class="text-center mt-4 name">
            Acesso Professores e Secretaria
        </div>
        <form method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Usuário">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>
            <button type="submit" class="btn mt-3">Entrar</button>
        </form>
        <?php if (isset($erro)): ?>
            <p class="erro" style="color:red; text-align:center;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
