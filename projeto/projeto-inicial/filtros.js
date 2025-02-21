function filtrarProdutos() {
    /*Função de filtro para os produtos de acordo com o status e o termo de pesquisa */
    //Filtro de status que será selecionado
    const statusSelecionado = document.getElementById('filtro-status').value;
    //Termo pesquisado
    const termoPesquisa = document.getElementById('pesquisa').value.toLowerCase();
    
    //Seleciona todos os produtos
    const produtos = document.querySelectorAll('.container-produto');
    
    produtos.forEach(produto => {
        //para cada produto em produtos selecione
        const status = produto.querySelector('p:nth-child(6)').textContent.toLowerCase();
        const nome = produto.querySelector('p:nth-child(2)').textContent.toLowerCase();
        const descricao = produto.querySelector('p:nth-child(3)').textContent.toLowerCase();
        
        //Verifica se o produto é igual ao status selecionado ou se o nome ou descrição está no termo pesquisado
        const atendeStatus = statusSelecionado === 'todos' || status === statusSelecionado;//escolha do status
        const atendePesquisa = nome.includes(termoPesquisa) || descricao.includes(termoPesquisa);//o que foi pesquisado
        
        //Mostra ou esconde o produto baseado nos filtros
        if (atendeStatus && atendePesquisa) {
            /*remove a classe produto-escondido do css interno*/
            produto.classList.remove('produto-escondido');
        } else {
            /*adiciona a classe produto-escondido do css interno*/
            produto.classList.add('produto-escondido');
        }
    });
} 