Sistema: Desenvolvimento de Sistema Básico usando CRUD

Objetivo: O objetivo desse site é desenvolver um sistema simples utilizando as operações CRUD 
(Create, Read, Update, Delete) para gerenciar tarefas do dia a dia. O sistema permitirá que o 
usuário crie, visualize, edite e apague suas tarefas diárias, proporcionando uma forma de 
organização pessoal.

C (Create): Criar novos registros. No caso do nosso sistema, isso significa adicionar uma 
nova tarefa.
D (Delete): Excluir um registro. O usuário pode remover uma tarefa do sistema.

Requisitos:
Data de vencimento
Status da tarefa (pendente, em andamento, concluída)

Passos para a Implementação:
Configuração do Banco de Dados:
Criacao de uma tabela para armazenar as informações das tarefas (título, descrição, data de 
vencimento, status, prioridade).
Se estiver utilizando um banco de dados relacional, crie as tabelas com os campos necessários.
Desenvolvimento do Back-End:
Servidor Local Mysql com XAMPP
Implemente as rotas para cada operação do CRUD:
POST: Para adicionar tarefas (Create).
GET: Para listar e visualizar tarefas (Read).
PUT: Para editar tarefas (Update).
DELETE: Para excluir tarefas (Delete).
Desenvolvimento do Front-End:
Foi criado páginas HTML com formulários para adicionar, editar e excluir tarefas.
Exiba as tarefas cadastradas em uma tabela ou lista.

Documentação do Projeto:
Introdução:
Este projeto consiste em um sistema simples de gerenciamento de tarefas diárias utilizando a 
metodologia CRUD. Ele visa ajudar o usuário a organizar e controlar suas atividades.
Requisitos Técnicos:
Linguagens: Python ou JavaScript
Banco de Dados: MySQL, PHP, CSS, JS, HTML.
Testes:
Acesse a aplicação no navegador em http://localhost:5000 (para Flask) ou http://localhost:3000 
(para Express) e teste as funcionalidades de CRUD.

Funcionamento do CRUD: O sistema deve realizar as operações de criar, ler, editar e excluir 
tarefas corretamente.
Interface: A interface é simples e funcional, permitindo uma interação clara.

Serenatto.sql -> Script do banco de dados local utilizado;
Login.php -----> Segundo contato para acesso do usuário;
cadastro.php --> Primeiro contado para cadastrar usuário no banco, guarde a senha;
index.php -----> Página principal com o menu de produtos e suas caracteristicas, essa interface
possui botões, buscador e seletor de opções;
criar-produto.php > área de formulário para criar pruduto;
editar-produto.php > área de formulário para editar pruduto;
excluir-produto.php > área de script php para excluir pruduto;
filtros.js ----> funções para fitrar os dados apresentados em index.php do seletor e campo de pesquisa;
pasta css ---> armazena o css utilizado nas páginas.
pasta img ---> armazena imagems utilizadas(observação: algumas imagems são faltantes, pois
estavam localmente no servidor de produção);
pasta src com conexão-db.php > contém a conexão local com o banco de dados;
acessar.txt na pasta Base contém um usuário cadastrado;










	
