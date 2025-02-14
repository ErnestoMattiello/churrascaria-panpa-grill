<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexao.php');




// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe o código do produto a ser excluído
    $code = mysqli_real_escape_string($conexao, $_POST['code']);

    // Exclui o produto do banco de dados com base no código
    $sql = "DELETE FROM tblproduct WHERE code = '$code'";
    if (mysqli_query($conexao, $sql)) {
        // Define mensagem de sucesso e redireciona
        header("Location: exc.php?");
        exit();
    } else {
        $message = "Erro ao excluir o produto: " . mysqli_error($conexao);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
    <style>
        /* Estilos gerais */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #24171f; /* Fundo escuro */
    color: #fff; /* Texto claro */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Título */
h1 {
    color: #c9b849; /* Dourado */
    text-align: center;
    margin-bottom: 20px;
    font-size: 26px;
    text-transform: uppercase;
    padding-right: 60px;
}

/* Formulário */
form {
    background-color: #6f0b00; /* Vermelho escuro */
    padding: 25px;
    border: 1px solid #c96823; /* Laranja queimado */
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 400px;
}

/* Labels */
label {
    display: block;
    font-weight: bold;
    color: #c9b849; /* Dourado */
    margin-bottom: 8px;
}

/* Campos de entrada */
input[type="text"],
input[type="url"],
button {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #c96823; /* Laranja queimado */
    border-radius: 6px;
    background-color: #24171f; /* Fundo escuro para campos */
    color: #fff;
    box-sizing: border-box;
    font-size: 14px;
}

input[type="text"]:focus,
input[type="url"]:focus {
    border-color: #c9b849; /* Dourado */
    outline: none;
    box-shadow: 0 0 5px rgba(201, 184, 73, 0.5);
}

/* Botão "Adicionar Produto" */
button {
    background-color: #c96823; /* Laranja queimado */
    color: #fff;
    padding: 12px;
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #be3100; /* Vermelho queimado */
    transform: scale(1.03);
}

button:active {
    background-color: #7a2222; /* Vermelho mais escuro */
}

/* Estilo para o botão "Voltar" */
button a {
    text-decoration: none; /* Remove o sublinhado */
    color: #fff; /* Cor do texto igual ao do botão */
    display: block; /* Faz o link ocupar todo o botão */
    width: 100%;
    height: 100%;
}

button a:hover {
    background-color: #be3100; /* Cor do fundo quando hover */
    color: #fff; /* Mantém a cor do texto como branco */
}

/* Responsividade */
@media (max-width: 600px) {
    form {
        padding: 20px;
    }

    h1 {
        font-size: 22px;
    }

    button {
        font-size: 14px;
    }

    a {
        text-decoration: none;
        color: white;
    }
}
    </style>
</head>
<body>
    <h1>Excluir Produto</h1>
    <form action="exc.php" method="POST">
        <label for="code">Código do Produto:</label><br>
        <input type="text" name="code" id="code" placeholder="Digite o código do produto" required><br><br>

        <button type="submit">Excluir Produto</button>
        <button><a href="admin.php">Voltar</a></button>
    </form>

</body>
</html>