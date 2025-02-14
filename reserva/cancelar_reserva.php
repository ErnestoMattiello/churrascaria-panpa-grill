<?php
session_start();
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE reservas SET status = 'cancelada' WHERE id = '$id'";
    if (mysqli_query($conexao, $sql)) {
        header("Location: admin.php");
    } else {
        echo "Erro ao cancelar reserva.";
    }
}