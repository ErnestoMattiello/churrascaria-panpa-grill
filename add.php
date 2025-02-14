<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexao.php');



// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $name = mysqli_real_escape_string($conexao, $_POST['name']);
    $code = mysqli_real_escape_string($conexao, $_POST['code']);
    $price = floatval($_POST['price']);
    $image = mysqli_real_escape_string($conexao, $_POST['image']); // Recebe a URL da imagem

    // Insere os dados no banco de dados
$sql = "INSERT INTO tblproduct (`name`,`code`, `image`, `price`) VALUES ('$name', '$code', '$image', $price)";
    if (mysqli_query($conexao, $sql)) {
        // Define mensagem de sucesso e redireciona
        header("Location: add.php");
        exit();
    } else {
        $message = "Erro ao adicionar o produto: " . mysqli_error($conexao);
    }
}

// Verifica se há uma mensagem de sucesso após o redirecionamento
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Produto adicionado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<style>

/* Estilos gerais */
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
<body>
    <h1>Adicionar Produto</h1>
    <form action="add.php" method="POST">
        <label for="name">Nome do Produto:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="code">Código:</label><br>
        <input type="text" name="code" id="code" required><br><br>

        <label for="price">Preço:</label><br>
        <input type="text" name="price" id="price" required><br><br>

        <label for="image">URL da Imagem:</label><br>
        <input type="url" name="image" id="image" placeholder="http://exemplo.com/imagem.jpg" required><br><br>

        <button type="submit">Adicionar Produto</button>
        <button><a href="admin.php">Voltar</a></button>
    </form>


</body>
</html>