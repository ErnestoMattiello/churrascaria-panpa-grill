<?php 
include_once("conexao.php");
include("headeradmin.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botões Bonitos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #24171f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .button-container {
            display: flex;
            gap: 20px;
            
        }

        .btnn {
        padding: 15px 30px;
        background-color: #c96823;
        color: white;
        font-size: 16px;
        text-decoration: none; /* Remove a linha embaixo */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btnn:hover {
        background-color: #be3100;
        transform: translateY(-4px);
        text-decoration: none; /* Garantir que não apareça underline */
        color: white; /* Garantir que a cor do texto não mude para azul */
    }

    .btnn:active {
        transform: translateY(2px);
    }

    .btnn:focus {
        outline: none;
    }

    a {
        text-decoration: none; /* Certifique-se de remover underline nos links */
    }


    </style>
</head>
<body>

    <div class="button-container">
        <!-- Botão 1 -->
        <a href="naosei.php" class="btnn">Pedidos</a>

        <!-- Botão 2 -->
        <a href="add.php" class="btnn">Adicionar Produto</a>

        <a href="exc.php" class="btnn">Remover Produto</a>
        <a href="cadastroadmin.php" class="btnn">Adicionar ADM</a>


        
    </div>

</body>
</html>
