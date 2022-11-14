<?php
// arquivo que realiza o logout do usuário

// condional para checar se existe sessão ativa 
if (!isset($_SESSION)) {
  // caso não exista, ativa a sessão
  session_start();
}

// para o sistema de logout, basicamente vamos destruir a sessão para que o login suma
session_destroy();

// redirecionamento de página
header("Location: index.php");
