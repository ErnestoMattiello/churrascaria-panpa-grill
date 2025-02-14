<?php
include('conexao.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // A senha ainda está em formato simples

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql_email);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>alert('Este e-mail já está cadastrado!');</script>";
    } else {
        // Validação da senha antes de aplicar o hash
        $erro = null;

        // Verificar se a senha contém pelo menos um número e o caractere '@'
        if (!preg_match('/[0-9]/', $senha) || !preg_match('/@/', $senha)) {
            $erro = "A senha precisa conter pelo menos um número e o caractere @.";
        }

        // Verificar se a senha contém sequências numéricas como '123', '234', etc.
        if (preg_match('/123|234|345|456|567|678|789|012/', $senha)) {
            $erro = "A senha não pode conter sequências numéricas como 123, 456, etc.";
        }

        // Verificar se a senha contém pelo menos uma letra maiúscula e uma letra minúscula
        if (!preg_match('/[A-Z]/', $senha) || !preg_match('/[a-z]/', $senha)) {
            $erro = "A senha precisa conter pelo menos uma letra maiúscula e uma letra minúscula.";
        }

        // Se houver erro de validação, exibe a mensagem e interrompe o cadastro
        if ($erro) {
            echo "<script>alert('$erro');</script>";
        } else {
            // Se a senha for válida, faz o hash da senha
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            
            // Define o nível de usuário, o padrão é 'usuario'
            $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : 'usuario';

            // Insere os dados no banco
            $sql = "INSERT INTO usuarios (nome, email, senha, nivel) VALUES ('$nome', '$email', '$senha', '$nivel')";
            if (mysqli_query($conexao, $sql)) {
                echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
                
                // Redireciona após o cadastro para evitar reenvio do formulário
                header("Location: cadastro.php");
                exit;
            } else {
                echo "<script>alert('Erro ao cadastrar usuário!');</script>";
            }
        }
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
                <br>
                <!-- O formulário agora envia os dados para o próprio arquivo de cadastro -->
                <form action="cadastro.php" method="POST">
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
                    <button type="submit">Register</button>
                    <div class="register">
                        <br>
                        <p>Have one account? <a href="login.php" >Log in</a></p>
                    </div>
                    <!-- A seleção de nível é mantida oculta, mas envia o valor 'usuario' -->
                    <select name="nivel" style="display: none;">
                        <option value="usuario">usuario</option>
                    </select>
                    
                </form><div class="naosei">
                        <button><a href="index.php">Voltar</a></button>

                    </div>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
