<?php
#conexão com o banco
require "src/conexao-bd.php";

$sql1 = "SELECT * FROM produtos WHERE tipo = 'cafe' ";
#Foi removido da requisição dos items a ordenação -> ORDER BY preco";
#errado no Café
#requisição
$statement = $pdo -> query($sql1);
#dados da requisição
$produtosCafe = $statement -> fetchAll(PDO::FETCH_ASSOC);
#array associativo dos dados


$sql2 = "SELECT * FROM produtos WHERE tipo = 'almoco' ";
#Foi removido da ordenação dos items a ordenação -> ORDER BY preco";#errado no Almoço
#requisição
$statement =$pdo -> query($sql2);
#dados da requisição
$produtosAlmoco = $statement -> fetchAll(PDO::FETCH_ASSOC);

//var_dump($produtosCafe);

//exit();

?>

<!doctype html>

<html lang="pt-br">



<head>

    <meta charset="UTF-8">

    <meta name="viewport"

        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="css/index2.css">

    <link rel="stylesheet" href="css/index3.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    

    <title>Serenatto - Cardápio</title>

</head>



<body>
    
    <main>

        <section class="container-banner">

            <div class="container-texto-banner">

                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">

            </div>
            
        </section>
        
        <div class="container-filtros">
            <div class="filtro-status">
                <label for="filtro-status" id="filtro-status">Filtrar/Pesquisar:</label>
                <select id="filtro-status" onchange="filtrarProdutos()">
                    <option value="todos">Todos</option>
                    <option value="pendente">Pendente</option>
                    <option value="em_andamento">Em Andamento</option>
                    <option value="concluida">Concluída</option>
                </select>
            </div>
            
            <div class="barra-pesquisa">
                <p></p>
                <input type="text" id="pesquisa" placeholder="Pesquisar por nome ou descrição..." 
                       onkeyup="filtrarProdutos()">
            </div>
        </div>

        <h2>Cardápio Digital</h2>
        

        <!-- café da manhã -->

        <section class="container-cafe-manha">

            <div class="container-cafe-manha-titulo">

                <h3>Opções para o Café</h3>

                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">

            </div>

            <div class="container-cafe-manha-produtos">

                <?php foreach ($produtosCafe as $cafe):?>

                    <div class="container-produto">

                        <div class="container-foto">

                            <img src="<?php echo $cafe['imagem'] ?>">

                        </div>

                        <p><?= $cafe['nome'] /*p:nth-child(2)'.textContent.toLowerCase()*/?></p>

                        <p><?= $cafe['descriçao'] /*p:nth-child(3)'.textContent.toLowerCase()*/?></p>

                        <p><?= "R$ " . $cafe['preco'] ?></p>

                        <p><?= $cafe['prioridade'] ?></p>

                        <p><?= $cafe['status'] /*p:nth-child(6)'.textContent.toLowerCase()*/?></p>

                        <div class="container-botao">
                            <a href="editar-produto.php?id=<?= $cafe['id'] ?>" class="botao-editar">✎ Editar</a>
                            <a href="excluir-produto.php?id=<?= $cafe['id'] ?>" class="botao-excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?')">🗑️ Excluir</a>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

        <!-- Almoço -->

        <section class="container-almoco">

        <div class="container-almoco-titulo">

                <h3>Opções para o Almoço</h3>

                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">

            </div>

            <div class="container-almoco-produtos">

                <?php foreach ($produtosAlmoco as $almoco): ?>

                    <div class="container-produto">

                        <div class="container-foto">

                            <img src="<?php echo $almoco['imagem'] ?>">

                        </div>

                        <p><?= $almoco['nome'] ?></p>

                        <p><?= $almoco['descriçao'] ?></p>

                        <p><?= "R$ " . $almoco['preco'] ?></p>

                        <p><?= $almoco['prioridade'] ?></p>

                        <p><?= $almoco['status'] ?></p>

                        <div class="container-botao">
                            <a href="editar-produto.php?id=<?= $almoco['id'] ?>" class="botao-editar">✎ Editar</a>
                            <a href="excluir-produto.php?id=<?= $almoco['id'] ?>" class="botao-excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?')">🗑️ Excluir</a>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        </section>
        <div class="container-botao-novo">
            <a href="criar-produto.php" class="botao-novo">+ Novo Produto</a>
        </div>

    </main>
    <script src="filtros.js"></script>
</body>



</html>
