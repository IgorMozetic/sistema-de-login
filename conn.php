<?php
// esse arquivo realiza a conexão com o banco de dados

// essas são as credencias padrão para ter acesso ao banco de dados, no caso o nome do db muda para o queal você colocou no seu banco de dados
$dbname = 'login';
$host = 'localhost';
$user = 'root';
$pass = '';

// realizando a conexão com o banco de dados
$mysqli = new mysqli($host, $user, $pass, $dbname);

// condicional para checar se está tudo certo com a conexão
if ($mysqli->error) {
  // caso de erro, essa mensagem será exibida na tela 
  die("Ocorreu um erro ao tentar a conexão com o banco de dados " . $mysqli->error);
}
