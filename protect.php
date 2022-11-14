<?php
// aruqivo onde é realizado a proteção de página que apenas usuários logados podem acessar

// condional para checar se existe sessão ativa 
if (!isset($_SESSION)) {
  // caso não exista, ativa a sessão
  session_start();
}

// condiocional para checar se a sessão com o id do usuário existe
if (!isset($_SESSION['id'])) {
  // caso não exista a sessão com o id do usuário, a mensagem é exibida
  die("Você não pode acessar esta página porque não está logado.<br><br><a href=\"index.php\"><button>Entrar</button></a>");
}
