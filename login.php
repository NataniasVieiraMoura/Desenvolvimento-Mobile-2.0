<?php
session_start();
require "projeto/projeto-inicial/src/conexao-bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: projeto/projeto-inicial/index.php');
        exit();
    } else {
        $erro = "Email ou senha incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projeto/projeto-inicial/css/reset.css">
    <link rel="stylesheet" href="projeto/projeto-inicial/css/index.css">
    <link rel="stylesheet" href="projeto/projeto-inicial/css/index2.css">
    <link rel="stylesheet" href="projeto/projeto-inicial/css/login.css">
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Login</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <!--div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="">
            </div-->
        </section>
        
        <div class="container-forms">
            <div class="form-box">
                <h3>Login</h3>
                <?php if (isset($erro)): ?>
                    <p class="erro-mensagem"><?= $erro ?></p>
                <?php endif; ?>
                <?php if (isset($_GET['sucesso'])): ?>
                    <p class="sucesso-mensagem">Cadastro realizado com sucesso!</p>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn-submit">Entrar</button>
                </form>
                <p class="link-alternativo">
                    Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
                </p>
            </div>
        </div>
    </main>
</body>
</html> 