<?php
session_start(); // Inicia a sessão

// Verifica se a sessão está ativa e destrói a sessão
if (isset($_SESSION['user_id'])) {
    session_unset(); // Remove todas as variáveis de sessão
    session_destroy(); // Destroi a sessão

    // Redireciona para a página de login ou para a página inicial
    header("Location: ../../churrascaria/login.php"); // Substitua "login.php" pela página desejada
    exit();
} else {
    // Caso o usuário não esteja logado, redireciona para a página inicial
    header("Location: index.php");
    exit();
}