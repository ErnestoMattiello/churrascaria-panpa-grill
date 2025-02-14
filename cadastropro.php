<?php
session_start();
include("headeradmin.php");
include_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    // Caminho para salvar a imagem
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // Inserir no banco de dados
        $sql = "INSERT INTO tblproduct (name, code, image, price) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('sssd', $name, $code, $uploadFile, $price);

        if ($stmt->execute()) {
            echo "<script>alert('Produto cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar o produto.');</script>";
        }
    } else {
        echo "<script>alert('Erro ao fazer upload da imagem.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2d1f27;
            color: #ffffff;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #3e282e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #f4c542;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }
        form input {
            background-color: #4a3438;
            color: #ffffff;
        }
        form button {
            background-color: #f4a321;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form button:hover {
            background-color: #d68a2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Cadastrar Produto</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Nome do Produto:</label>
            <input type="text" id="name" name="name" required>

            <label for="code">Código do Produto:</label>
            <input type="text" id="code" name="code" required>

            <label for="price">Preço:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>