<?php
include('conexao.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Captura o valor do campo 'nivel' selecionado no formulário
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : 'usuario';

    $sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES ('$nome', '$email', '$senha', '$nivel')";
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        
        // Redireciona após o cadastro para evitar o reenvio do formulário ao atualizar
        header("Location: cadastroadmin.php");
        exit;
    } else {
        echo "<script>alert('Erro ao cadastrar usuário!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                
                <form action="cadastroadmin.php" method="POST">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nome" required>
                        <label>Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="senha" required>
                        <label>Password</label>
                    </div>
                    <div>
                        <label for="nivel"></label>
                        <select name="nivel" style="display: none;" required>
                        
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <button type="submit">Register</button>
                    <div class="register">
                        <p>Have an account? <a href="login.php">Log in</a></p>
                    </div>
                </form><div class="naosei">
                        <button><a href="admin.php">Voltar</a></button>

                    </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
