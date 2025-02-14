<?php
session_start();

// Conexão com o banco de dados (alterar conforme suas configurações)
$host = "localhost";
$user = "root";
$password = "";
$database = "shopping_cart";
$conn = new mysqli($host, $user, $password, $database);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para buscar os produtos no banco de dados
function getProducts($conn) {
    $query = "SELECT * FROM tblproduct ORDER BY id ASC";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Função para adicionar produto ao carrinho
function addToCart($code, $quantity, $conn) {
    $productQuery = "SELECT * FROM tblproduct WHERE code = '$code'";
    $productResult = $conn->query($productQuery);
    $product = $productResult->fetch_assoc();

    if ($product) {
        $itemArray = array(
            $product['code'] => array(
                'name' => $product['name'],
                'code' => $product['code'],
                'quantity' => $quantity,
                'price' => $product['price'],
                'image' => $product['image']
            )
        );

        if (!empty($_SESSION['cart_item'])) {
            if (in_array($product['code'], array_keys($_SESSION['cart_item']))) {
                foreach ($_SESSION['cart_item'] as $k => $v) {
                    if ($product['code'] == $k) {
                        $_SESSION['cart_item'][$k]['quantity'] += $quantity;
                    }
                }
            } else {
                $_SESSION['cart_item'] = array_merge($_SESSION['cart_item'], $itemArray);
            }
        } else {
            $_SESSION['cart_item'] = $itemArray;
        }
    }
}

// Função para remover produto do carrinho
function removeFromCart($code) {
    if (!empty($_SESSION['cart_item'])) {
        foreach ($_SESSION['cart_item'] as $k => $v) {
            if ($code == $k) {
                unset($_SESSION['cart_item'][$k]);
            }
        }
    }
}

// Função para esvaziar o carrinho
function emptyCart() {
    unset($_SESSION['cart_item']);
}

// Função para salvar o pedido no banco de dados
function placeOrder($conn) {
    // Criar um código único para o pedido
    $order_code = "ORDER-" . strtoupper(uniqid());

    // Calcular o preço total
    $total_price = 0;
    foreach ($_SESSION['cart_item'] as $item) {
        $total_price += $item['quantity'] * $item['price'];
    }

    // Inserir o pedido na tabela tblorders
    $query = "INSERT INTO tblorders (order_code, total_price) VALUES ('$order_code', '$total_price')";
    if ($conn->query($query)) {
        $order_id = $conn->insert_id; // ID do pedido inserido

        // Inserir os itens do pedido na tabela tblorder_items
        foreach ($_SESSION['cart_item'] as $item) {
            $product_code = $item['code'];
            $product_name = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $query_items = "INSERT INTO tblorder_items (order_id, product_code, product_name, quantity, price) 
                            VALUES ($order_id, '$product_code', '$product_name', $quantity, $price)";
            $conn->query($query_items);
        }

        // Esvaziar o carrinho após o pedido ser registrado
        emptyCart();

        return true;
    } else {
        return false;
    }
}

// Ações do carrinho (adicionar, remover, esvaziar)
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (!empty($_POST['quantity'])) {
                addToCart($_GET['code'], $_POST['quantity'], $conn);
            }
            break;
        case 'remove':
            if (!empty($_GET['code'])) {
                removeFromCart($_GET['code']);
            }
            break;
        case 'empty':
            emptyCart();
            break;
        case 'place_order':
            if (placeOrder($conn)) {
                echo "<script>alert('Pedido realizado com sucesso!'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Erro ao realizar o pedido.'); window.location='index.php';</script>";
            }
            break;
    }
}

// Obter os produtos do banco
$product_array = getProducts($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
         <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .product-item {
            border: 1px solid #ddd;
            margin: 20px;
            padding: 10px;
            text-align: center;
            display: inline-block;
            width: 200px;
            background-color: #fff;
        }
        .product-image img {
            width: 100%;
            height: auto;
        }
        .product-title {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
        .product-price {
            font-size: 14px;
            color: #333;
        }
        .cart-action {
            margin-top: 10px;
        }
        .btnAddAction {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .btnAddAction:hover {
            background-color: #218838;
        }
        #shopping-cart {
            width: 80%;
            margin: auto;
        }
        .tbl-cart {
            width: 100%;
            margin: 20px 0;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        .tbl-cart th, .tbl-cart td {
            padding: 10px;
            text-align: left;
        }
        .tbl-cart td img {
            width: 50px;
        }
        .btnRemoveAction {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .btnRemoveAction:hover {
            background-color: #c82333;
        }
        #btnEmpty {
            background-color: #ffc107;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
    </style>
</head>
<body>

<!-- Exibição da galeria de produtos -->
<div id="product-gallery">
    <h2>Produtos Disponíveis</h2>
    <?php if (!empty($product_array)) { ?>
        <?php foreach ($product_array as $product) { ?>
            <div class="product-item">
                <form method="post" action="index.php?action=add&code=<?php echo $product['code']; ?>">
                    <div class="product-image"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"></div>
                    <div class="product-title"><?php echo $product['name']; ?></div>
                    <div class="product-price">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></div>
                    <div class="cart-action">
                        <input type="number" class="product-quantity" name="quantity" value="1" min="1" size="2" />
                        <input type="submit" value="Adicionar ao Carrinho" class="btnAddAction" />
                    </div>
                </form>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<!-- Exibição do carrinho de compras -->
<div id="shopping-cart">
    <h2>Carrinho de Compras</h2>

    <a id="btnEmpty" href="index.php?action=empty">Esvaziar Carrinho</a>

    <?php if (isset($_SESSION['cart_item'])) { ?>
        <table class="tbl-cart">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Preço Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_quantity = 0;
                $total_price = 0;
                foreach ($_SESSION['cart_item'] as $item) {
                    $item_price = $item['quantity'] * $item['price'];
                    $total_quantity += $item['quantity'];
                    $total_price += $item_price;
                    ?>
                    <tr>
                        <td><img src="<?php echo $item['image']; ?>" width="50" /> <?php echo $item['name']; ?></td>
                        <td><?php echo $item['code']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
                        <td>R$ <?php echo number_format($item_price, 2, ',', '.'); ?></td>
                        <td><a href="index.php?action=remove&code=<?php echo $item['code']; ?>" class="btnRemoveAction">Remover</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" align="right">Total:</td>
                    <td colspan="2"><strong>R$ <?php echo number_format($total_price, 2, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Botão de finalizar pedido -->
        <form method="post" action="index.php?action=place_order">
            <input type="submit" value="Finalizar Pedido" class="btnAddAction" />
        </form>
    <?php } else { ?>
        <p>Seu carrinho está vazio!</p>
    <?php } ?>
</div>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>
