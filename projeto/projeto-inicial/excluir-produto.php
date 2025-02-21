<?php
require_once 'src/conexao-bd.php';
#chama a conexão do bancoo

if (isset($_GET['id'])) {
    //Pega o parametro do registro escolhido para deletar
    $id = $_GET['id'];//trasforma o id em variável
    
    $sql = "DELETE FROM produtos WHERE id = ?";//linha mysql que deleta o registro
    $stmt = $pdo->prepare($sql);//etapa que isola a requisição evitando DDos
    $stmt->execute([$id]);//função que executa o código no banco
    
    if ($stmt) {
        //se o código for executado com sucesso, redireciona para a página index.php
        header("Location: index.php");
        exit();//finaliza o código
    }
}
//se o código não for executado com sucesso, redireciona para a página index.php
header("Location: index.php");
exit(); 