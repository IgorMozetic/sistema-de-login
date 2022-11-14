<?php
//incluido o arquivo de conexão ao banco dentro da index
include('conn.php');

// condicional para entender se as variáveis do formulário foram enviadas
if (isset($_POST['email']) || isset($_POST['senha'])) {
  // condicional para checar se o email está preenchido
  if (mb_strlen($_POST['email']) == 0) {
    // caso não esteja, exibe essa mensagem na tela 
    echo 'Preencha seu Email!';
    // condicional para checar se a senha está preenchido
  } else if (mb_strlen($_POST['senha']) == 0) {
    // caso não esteja, exibe essa mensagem na tela 
    echo 'Preencha sua Senha!';
    // caso tanto o email quanto a senha está preenchida, esse bloco de código é executado 
  } else {
    // função que bloqueia sql injection
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // criação da query para consulta no banco de dados
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    // realização da query no banco de dados, caso o código não seja executado, a consulta traz o erro que aconteceu
    $response = $mysqli->query($query) or die("Falha na execução da consulta: " . $mysqli->error);

    // condiconal para checar se existe apenas um cadastro com esse email e essa senha no banco de dados
    if ($response->num_rows == 1) {
      // transforma os dados da resposta em um array com chave e valor
      $usuario = $response->fetch_assoc();

      // condicional para checar se a seesão já está ativa
      if (!isset($_SESSION)) {
        // caso não esteja, ativa a sessão
        session_start();
      }
      // criação de duas sessões, tanto com o id do usuário quanto com o nome
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      // redirecionamento para uma nova página
      header("Location: painel.php");
    } else {
      // caso não exista dados com as credenciais enviadas pelo usuário, é exibido isso na tela
      echo "Falha ao tentar realizar o login! Email ou senha estão incorretos!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h1>Realize o Login</h1>
  <!-- estrutura básica de fomrulário de login -->
  <!-- o atributo action dentro da tag `form` está vazio, portanto os dados serão enviados para esse mesmo arquivos -->
  <form action="" method="POST">
    <!-- label e o input do email -->
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <br><br>
    <!-- label e o input da senha -->
    <label for="senha">Senha</label>
    <input type="password" id="senha" name="senha">
    <br><br>
    <!-- Botão de enviar o formulário -->
    <button type="submit">Login</button>
  </form>
</body>

</html>