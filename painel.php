<?php
// adiciona o arquivo onde realiza a proteção, ou seja, é uma página que apenas usuário logados conseguem acessar
include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel</title>
</head>

<body>
  <!-- Mensagem de Boas vindas -->
  Bem vindo ao Painel de Controle do usuário, <?php echo $_SESSION['nome']; ?>!
  <br><br>
  <!-- Botão para logout do sistema -->
  <a href="logout.php"><button>Sair da conta</button></a>
</body>

</html>