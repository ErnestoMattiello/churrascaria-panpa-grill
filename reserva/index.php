<?php
session_start();

include_once('conexao.php');

if (isset($_POST['nome_cliente'], $_POST['email_cliente'], $_POST['data_reserva'], $_POST['hora_reserva'], $_POST['numero_pessoas'])) {
    // Coletar os dados do formulário
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $data_reserva = $_POST['data_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $numero_pessoas = $_POST['numero_pessoas'];

    // Verificar se já existe uma reserva para a mesma data e hora
    $sql_check = "SELECT * FROM reservas WHERE data_reserva = '$data_reserva' AND hora_reserva = '$hora_reserva'";
    $result_check = mysqli_query($conexao, $sql_check);
    
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Desculpe, já há uma reserva para esse horário. Escolha outro horário.');</script>";
    } else {
        // Inserir a nova reserva
        $sql_insert = "INSERT INTO reservas (nome_cliente, email_cliente, data_reserva, hora_reserva, numero_pessoas) 
                        VALUES ('$nome_cliente', '$email_cliente', '$data_reserva', '$hora_reserva', '$numero_pessoas')";
        
        if (mysqli_query($conexao, $sql_insert)) {
            echo "<script>alert('Reserva realizada com sucesso!');</script>";
            header("Location: confirmar_reserva.php");
        } else {
            echo "<script>alert('Erro ao realizar a reserva. Tente novamente mais tarde.');</script>";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Reserva de Restaurante</title>

</head>
<?php include_once("../../churrascaria/headerlogado.php")?>
<body>
    <br><br><br>
    
    <div class="titulo">
        <h1>Faça sua Reserva</h1>
        <form action="index.php" method="POST">
            <label for="nome_cliente">Nome:</label>
            <input type="text" id="nome_cliente" name="nome_cliente" required><br><br>
        
            <label for="email_cliente">Email:</label>
            <input type="email" id="email_cliente" name="email_cliente" required><br><br>
        
            <label for="data_reserva">Data da Reserva:</label>
            <input type="date" id="data_reserva" name="data_reserva" required><br><br>
        
            <label for="hora_reserva">Hora da Reserva:</label>
            <input type="time" id="hora_reserva" name="hora_reserva" required><br><br>
        
            <label for="numero_pessoas">Número de Pessoas:</label>
            <input type="number" id="numero_pessoas" name="numero_pessoas" required><br><br>
            <button type="submit">Reservar</button>
        </form>
    </div>
</body>
</html>

