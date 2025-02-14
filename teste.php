<?php 
include("conexao.php"); // Certifique-se de que o caminho está correto

$consulta = "SELECT * FROM usuario"; 
$con = $mysqli->query($consulta) or die($mysqli->error); 
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Tutorial</title> 
</head> 
<body> 
    <table border="1"> 
        <tr> 
            <th>ID</th> 
            <th>Nome</th> 
            <th>Email</th> 
            <th>Senha</th>  
        </tr> 
        <?php while($dado = $con->fetch_array()) { ?> 
        <tr> 
            <td><?php echo htmlspecialchars($dado['id']); ?></td>
            <td><?php echo htmlspecialchars($dado['nome']); ?></td> 
            <td><?php echo htmlspecialchars($dado['email']); ?></td> 
            <td><?php echo htmlspecialchars($dado['senha']); ?></td> <!-- Adicionei a coluna 'senha' -->
        </tr> 
        <?php } ?> 
    </table> 
</body> 
</html>
