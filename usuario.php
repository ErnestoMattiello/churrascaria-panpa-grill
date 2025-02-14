<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['nivel'] != 'usuario') {

header("location: login.php");
exit();


}

echo " Bem vindo Usuario" . $_SESSION ['nome'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>somente o usuario vera essa parte</p>
    
</body>
</html>