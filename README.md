# TodoList
Código de uma todoList utilizando PHP, MySQL, JavaScript, HTML, CSS, JQuery e Ajax;

<br>

# Olá, me chamo Bruno Patrício Costa! 
 
Esse arquivo é uma espécie de Read.me que decidi fazer para explicar o meu raciocínio utilizado para fazer o desafio da To do List e também como acessar. 
<br>

## Stacks utilizadas:
Para esse projeto teste foi utilizado o Visual Studio Code como IDE/Editor de código e também PHP, JavaScript, HTML 5, CSS, Jquery, MySQL e Ajax.
 

## Como rodar:
Para rodar esse projeto é necessário realizar a instalação do Software XAMPP e com isso iniciar através do painel de controle o APACHE e MySQL. 
A partir disso, se fez necessário configurar as portas de acesso do Localhost, uma vez que a minha máquina já possuía outras configurações de outros projetos na modalidade freelancer que eu estou realizando. 
Nesse projeto foram utilizadas as portas 8080 e 4433 para o APACHE e 3306 para o MySQL. 


## DataBase Design:
Sabendo disso, criei o banco de dados através do localhost:8080/phpmyadmin, chamando o banco de todolist, preenchendo com colunas chamadas de ID, newTask, taskDescription e taskDueDate, sendo a ID do tipo INT e também como AUTO-INCREMENT. As chaves de newTask e taskDescription possuem o tipo Varchar e text, e por fim, o taskDueDate possui o tipo DATE. 
 
## Código propriamente dito:
Com o banco de dados criado e com design definido, fui para o código. 

Inicialmente optei por construir o front-end através do uso do HTML no arquivo index.php. 

Utilizei dois tipos de font-family (‘Ubuntu’ e ‘Caveat’) oriundos do Google Fonts, através da Tag <link>, sendo a primeira para dar um ar sério a aplicação e a segunda, para idealizar a escrita cursiva em uma folha em branco para dar a sensação de escrever nela. 

Utilizei também os ícones do Google Fonts para estilizar, já que era algo mais simples de se fazer. Caso contrário e fosse permitido, utilizaria bibliotecas mais robustas para tal.
Aqui, optei por utiliza uma estrutura de HTML com contém a TAG <style> que contém o código puro de CSS, pois agilizaria a realização do código inicial. 

## CRUD Structure:

READ:
<br>
Dentro do HTML tentei utilizar uma grande variedade de tags para mostrar o conhecimento, inclusive colocando os dados dentro de uma tabela, porém isso me limitaria em questão de espaço e não ficaria como eu gostaria, portanto, dentro da <div> que possui como classe a bodyLineTasks, eu inseri um código PHP que realiza uma QUERY puxando, ou seja, fazendo um FETCH dos meus dados da minha tabela “todolist” do meu banco de dados MySQL, realizando assim, o “READ” do CRUD.
<hr>
CREATE:
<br>
Na sequência, criei um botão chamado “Add new tasks” pra realizar o CREATE do meu CRUD, ou seja, fazer o insert dos dados. Esse botão abre um modal e a lógica que eu criei foi feita utilizando JavaScript, através da manipulação de DOM com o artifício getElementById e funções de onClick para abrir e fechar o modal, bem como salvar os dados. 
Para salvar os dados utilizei um novo arquivo PHP, chamado de inc.newTask.php. Lá temos a lógica de POST, que consiste basicamente em iniciar as variáveis que eu gostaria de inserir no banco de dados e realizar uma QUERY para inserir os dados na tabela no lugar em que eu gostaria, com os seus respectivos valores. Além do mais, foi criado uma estrutura condicional em JavaScript para demonstrar se houve algum problema ou se realmente algo foi adicionado a lista. 
<hr> 
UPDATE:
<br>
Em seguida, parti para o UPDATE do nosso CRUD, ou seja, realizar a alteração dos nossos dados na lista e no banco de dados. 
Aqui optei por criar uma nova página HTML, ou seja, ao clicarmos no botão de editar, o usuário é redirecionado para uma página específica que também realizar o FETCH dos nossos dados através do ID utilizando a variável $_GET do PHP e então utilizar a variável $_POST para fazer a atualização dos dados que precisamos. 
<hr>
DELETE:
<br>
Por fim, o DELETE do nosso CRUD. Aqui penso que é a questão mais simples do CRUD uma vez que consiste em pegar o ID selecionado e apagar as suas informações do banco de dados. 
