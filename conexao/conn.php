<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "bdchurrascarias";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	if($conn){
        echo "";
    }
    else{
        echo "não conectado" .mysqli_connect_errno();
    }
?>