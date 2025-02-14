<?php
include_once('conexao.php');
include_once("headeradmin.php");

// Consulta SQL para selecionar os itens agrupados por 'order_code' e 'product_code'
$sql = "
    SELECT 
        order_code,
        product_code,
        product_name,
        SUM(quantity) AS total_quantity,
        SUM(total_price) AS total_order_price,
        order_status
    FROM tblorder_details
    GROUP BY order_code, product_code
    ORDER BY order_code, product_code
";

// Executando a consulta
$result = $conexao->query($sql);

// Lógica para atualizar o status do pedido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_status']) && isset($_POST['order_code']) && isset($_POST['new_status'])) {
        $order_code = $_POST['order_code'];
        $new_status = $_POST['new_status'];

        // Atualizando o status do pedido na tabela
        $update_query = "UPDATE tblorder_details SET order_status = ? WHERE order_code = ?";
        $stmt = $conexao->prepare($update_query);
        $stmt->bind_param("ss", $new_status, $order_code);
        $stmt->execute();
        
        // Redirecionando após a atualização
       
    }

    if (isset($_POST['delete_order']) && isset($_POST['order_code'])) {
        $order_code = $_POST['order_code'];

        // Deletando o pedido
        $delete_query = "DELETE FROM tblorder_details WHERE order_code = ?";
        $stmt = $conexao->prepare($delete_query);
        $stmt->bind_param("s", $order_code);
        $stmt->execute();
        
        // Redirecionando após a exclusão
        echo "<script>alert('Pedido excluído com sucesso!'); window.location.href='naosei.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding-top: 3%;
        background-color: #2d1f27;
        color: #ffffff;
    }
    .container {
        width: 80%;
        margin: 40px auto;
        background-color: #3e282e;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        
    }
    h3 {
        color: #f4c542;
        text-align: center;
        border-bottom: 2px solid #f4a321;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .order-details {
        margin-bottom: 20px;
        text-align: left;
        background-color: #4a3438;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
    .order-details p {
        margin: 10px 0;
        font-size: 16px;
        line-height: 1.5;
    }
    .product-name {
        font-weight: bold;
        color: #f4c542;
    }
    .product-quantity,
    .total-price {
        font-size: 14px;
        color: #e0e0e0;
    }
    .total-price {
        font-weight: bold;
        font-size: 20px;
        color: #f4c542;
        margin-top: 10px;
    }
    .total-order-price {
        font-weight: bold;
        font-size: 22px;
        color: #f4c542;
        margin-top: 30px;
        text-align: center;
        padding: 15px;
        background-color: #4a3438;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
    .error-message {
        color: #e84545;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }
    .order-separator {
        border-top: 2px dashed #f4a321;
        margin: 20px 0;
    }
    .cart-actions {
        text-align: center;
        margin-top: 20px;
    }
    .update-button, .delete-button {
        background: linear-gradient(90deg, #f4a321, #d68a2f);
        padding: 12px 30px;
        color: #ffffff;
        border: none;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s ease;
        padding: 10px 30px 10px 30px;
        margin-left: 15px;
    }
    .update-button:hover, .delete-button:hover {
        background: linear-gradient(90deg, #d68a2f, #b36c22);
        transform: scale(1.05);
    }
    .update-button:active, .delete-button:active {
        transform: scale(0.97);
    }

    /* Estilização do campo select */
    select {
        padding: 8px 12px;
        font-size: 14px;
        background-color: #4a3438;
        color: #fff;
        border: 1px solid #f4c542;
        border-radius: 5px;
        width: 150px;
        margin-left: 10px;
        transition: all 0.3s ease;
    }
    select:hover {
        background-color: #f4c542;
        color: #3e282e;
    }
    select:focus {
        background-color: #d68a2f;
        border-color: #f4a321;
        outline: none;
    }

    .cart-actions input[type="submit"] {
        margin-top: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Verificando se a consulta retornou resultados
        if ($result->num_rows > 0) {
            // Variável para armazenar o código do pedido atual
            $current_order_code = ""; 
            $current_order_total_price = 0; // Variável para acumular o preço total do pedido
            $order_items = []; // Armazenará os itens do pedido
            
            while ($row = $result->fetch_assoc()) {
                // Se o código do pedido mudou, exibe o título do pedido
                if ($current_order_code != $row['order_code']) {
                    // Se já havia algum pedido, exibe o preço total acumulado e o formulário de status
                    if ($current_order_code != "") {
                        // Exibindo o preço total do pedido com estilo
                        echo "<div class='total-order-price'>";
                        echo "<p><strong>Preço Total do Pedido: R$ " . number_format($current_order_total_price, 2, ',', '.') . "</strong></p>";
                        echo "</div>";

                        // Formulário para atualizar o status ou excluir o pedido
                        echo "<div class='cart-actions'>";
                        echo "<form action='' method='POST'>";
                        echo "<input type='hidden' name='order_code' value='" . $current_order_code . "'>";
                        echo "<select name='new_status'>";
                        echo "<option value='Espera'>Espera</option>";
                        echo "<option value='Em Preparo'>Em Preparo</option>";
                        echo "<option value='Concluído'>Concluído</option>";
                        echo "<option value='Entregue'>Entregue</option>";
                        echo "</select>";
                        echo "<input type='submit' name='update_status' value='Atualizar Status' class='update-button'>";
                        echo "<input type='submit' name='delete_order' value='Excluir Pedido' class='delete-button'>";
                        echo "</form>";
                        echo "</div>";

                        // Exibe uma linha de separação entre pedidos
                        echo "<div class='order-separator'></div>";
                    }
                    
                    // Atualiza o código do pedido e zera o preço total do pedido
                    $current_order_code = $row['order_code'];
                    $current_order_total_price = 0; // Reinicia o total para o próximo pedido
                    $order_items = []; // Reinicia os itens do pedido
                    
                    echo "<hr><h3>Pedido: " . $row['order_code'] . "</h3><br>";
                }

                // Exibindo os dados do produto dentro do pedido
                echo "<div class='order-details'>";
                echo "<p><span class='product-name'>Produto:</span> " . $row['product_name'] . "</p>";
                echo "<p><span class='product-quantity'>Quantidade Total:</span> " . $row['total_quantity'] . "</p>";
                echo "<p><span class='new-status'>Status: ". $row['order_status'] . "</span></p>";
                echo "<p><span class='total-price'>Preço Total: R$ " . number_format($row['total_order_price'], 2, ',', '.') . "</span></p>";
                echo "</div>";

                // Acumulando o preço total do pedido
                $current_order_total_price += $row['total_order_price'];
                $order_items[] = $row; // Adicionando item ao pedido
            }
            
            // Exibe o preço total do último pedido com o estilo aplicado
            echo "<div class='total-order-price'>";
            echo "<p><strong>Preço Total do Pedido: R$ " . number_format($current_order_total_price, 2, ',', '.') . "</strong></p>";
            echo "</div>";

            // Formulário para atualizar o status ou excluir o pedido do último pedido
            echo "<div class='cart-actions'>";
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' name='order_code' value='" . $current_order_code . "'>";
            echo "<select name='new_status'>";
            echo "<option value='Espera'>Espera</option>";
            echo "<option value='Em Preparo'>Em Preparo</option>";
            echo "<option value='Concluído'>Concluído</option>";
            echo "<option value='Entregue'>Entregue</option>";
            echo "</select>";
            echo "<input type='submit' name='update_status' value='Atualizar Status' class='update-button'>";
            echo "<input type='submit' name='delete_order' value='Excluir Pedido' class='delete-button'>";
            echo "</form>";
            echo "</div>";

        } else {
            echo"<br><br><br><br><br><br><br><br><br>";
            
            echo "<p class='error-message'>Nenhum detalhe de pedido encontrado.</p>";
        }

        // Fechando a conexão
        $conexao->close();
        ?>
    </div>
</body>
</html>
