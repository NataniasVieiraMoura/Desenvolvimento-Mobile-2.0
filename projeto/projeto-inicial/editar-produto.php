<?php
require "src/conexao-bd.php";
#conecta com o banco

if (isset($_GET['id'])) {#isset verifica se a variável não é nula
    $id = $_GET['id'];
    #POST: Para adicionar tarefas (Create).
    #GET: Para listar e visualizar tarefas (Read).
    #PUT: Para editar tarefas (Update).
    #DELETE: Para excluir tarefas (Delete).
    $sql = "SELECT * FROM produtos WHERE id = ?";#faz a requisição de todos os dados da tabela
    $stmt = $pdo->prepare($sql);#prepara para consulta segura(a requisição não pode ser alterada)
    $stmt->execute([$id]);#executa a busca pelo id específico
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);#retorna os dados da tabela em forma de array
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #verifica se o método de requisição é post
    #Medida de segurança para evitar que o usuário acesse a página de edição
    $id = $_POST['id'];
    #$_POST: Para receber dados do formulário e mostrar na página.
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    
    // Processamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        #verifica se o arquivo foi enviado e se não houve erros
        $imagem = $_FILES['imagem']['name'];
        #$imagem: Para receber o nome do arquivo enviado
        $caminho_imagem = "img/" . $imagem;
        #$caminho_imagem: Para receber o caminho do arquivo enviado
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem);
        #move_uploaded_file: Para mover o arquivo enviado para a pasta img
        
        $sql = "UPDATE produtos SET nome = ?, descriçao = ?, preco = ?, imagem = ? WHERE id = ?";
        #$sql: Para atualizar os dados da tabela
        $stmt = $pdo->prepare($sql);
        #$stmt: Para preparar a consulta segura
        $stmt->execute([$nome, $descricao, $preco, $caminho_imagem, $id]);
        #$stmt->execute: Para executar a consulta segura  com os dados alterados
    } else {
        $sql = "UPDATE produtos SET nome = ?, descriçao = ?, preco = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $descricao, $preco, $id]);
    }
    
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index2.css">
    <link rel="stylesheet" href="css/index3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <title>Serenatto - Editar Produto</title>
    
</head>
<body>
    <main>
        <section class="container-admin-banner">
            <img src="img/logo-serenatto.png" class="logo-admin" alt="logo-serenatto">
            <h1 class="titulo">Editar Produto</h1>
        </section>
        <section class="container-form">
<!--o atributo method="post" envia os dados do formulário para o servidor mySQL
o atributo enctype="multipart/form-data" envia o arquivo para o servidor mySQL
-->
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>" required>
                
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" value="<?= $produto['descriçao'] ?>" required>
                
                <label for="preco">Preço</label>
                <input type="number" id="preco" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>
                
                <label for="imagem">Imagem</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
                
                <div class="container-botoes">
                    <button type="submit" class="botao-cadastrar">Salvar</button>
                    <a href="index.php" class="botao-voltar">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html> 