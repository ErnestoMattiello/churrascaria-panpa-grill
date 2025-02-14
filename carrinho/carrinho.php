<?php
session_start();
include_once('../../churrascaria/headerlogado.php');

// Conexão com o banco de dados (alterar conforme suas configurações)
$host = "localhost";
$user = "root";
$password = "";
$database = "bdchurrascarias";
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

// Função para salvar o pedido na tabela `tblorder_details`
function placeOrder($conn) {
    // Criar um código único para o pedido
    $order_code = "ORDER-" . strtoupper(uniqid());

    // Calcular o preço total do pedido
    $total_price = 0;
    foreach ($_SESSION['cart_item'] as $item) {
        $total_price += $item['quantity'] * $item['price'];
    }

    // Inserir os itens do pedido diretamente na tabela `tblorder_details`
    foreach ($_SESSION['cart_item'] as $item) {
        $product_code = $item['code'];
        $product_name = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $total_item_price = $quantity * $price;
        $created_at = date('Y-m-d H:i:s'); // Hora atual para o campo `created_at`

        // Inserir o item na tabela `tblorder_details`
        $query = "INSERT INTO tblorder_details (order_code, product_code, product_name, quantity, price, total_price, created_at) 
                  VALUES ('$order_code', '$product_code', '$product_name', $quantity, $price, $total_item_price, '$created_at')";

        if (!$conn->query($query)) {
            // Se houver erro na inserção, retornar false
            return false;
        }
    }

    // Esvaziar o carrinho após o pedido ser registrado
    emptyCart();

    return true; // Sucesso
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
                echo "<script>alert('Pedido realizado com sucesso!'); window.location='carrinho.php';</script>";
            } else {
                echo "<script>alert('Erro ao realizar o pedido.'); window.location='carrinho.php';</script>";
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
        /* Estilos específicos para a página de carrinho de compras */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #24171f; /* cor de fundo escura */
    color: #fff;
}

#product-gallery {
    text-align: center;
    margin: 30px 0;
    
}

h2 {
    color: #c9b849; /* cor para os títulos */
    text-align: center;
    margin-bottom: 20px;
}

.product-item {
    border: 1px solid #c96823;
    margin: 20px;
    padding: 15px;
    text-align: center;
    display: inline-block;
    width: 220px;
    background-color: #6f0b00;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.product-item:hover {
    transform: translateY(-10px); /* Efeito de hover */
}

.product-image img {
    width: 25vh;

    height: 18vh;
    border-radius: 5px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
    color: #c9b849;
}

.product-price {
    font-size: 16px;
    color: #fff;
}

.cart-action {
    margin-top: 10px;
}

.product-quantity {
    padding: 5px;
    width: 50px;
    border-radius: 5px;
    border: none;
    margin-right: 10px;
}

.btnAddAction {
    background-color: #c96823;
    color: white;
    padding: 8px 8px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    
}

.btnAddAction:hover {
    background-color: #be3100;
}

/* Estilos para o carrinho de compras */
#shopping-cart {
    width: 90%;
    margin: 40px auto;
    background-color: #6f0b00;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 1200px;
}

.tbl-cart {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
    color: #fff;
}

.tbl-cart th, .tbl-cart td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #c96823;
}

.tbl-cart td img {
    width: 50px;
    border-radius: 5px;
}

.btnRemoveAction {
    background-color: #be3100;
    color: white;
    padding: 6px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
}

.btnRemoveAction:hover {
    background-color: #be3100;
    color: #6f0b00;
}

#btnEmpty {
    background-color: #c9b849;
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

#btnEmpty:hover {
    background-color: #be3100;
}

.cart-empty {
    text-align: center;
    font-size: 20px;
    color: #c9b849;
    margin-top: 30px;
}

.cart-actions {
    text-align: center;
    margin-top: 20px;
}

.cart-actions input[type="submit"] {
    background-color: #c96823;
    padding: 10px 20px;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cart-actions input[type="submit"]:hover {
    background-color: #be3100;
}

/* Responsividade */
@media (max-width: 768px) {
    #product-gallery {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .product-item {
        width: 100%;
    }

    #shopping-cart {
        width: 95%;
    }

    .tbl-cart th, .tbl-cart td {
        font-size: 14px;
    }

    .product-title {
        font-size: 16px;
    }

    .product-price {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .product-item {
        width: 100%;
        padding: 10px;
    }

    .cart-action {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .product-quantity {
        width: 40px;
    }

    .btnAddAction {
        padding: 6px 12px;
    }

    #shopping-cart {
        width: 100%;
        padding: 15px;
    }

    .tbl-cart th, .tbl-cart td {
        font-size: 12px;
    }

    .product-title {
        font-size: 14px;
    }

    .product-price {
        font-size: 12px;
    }

    .cart-actions input[type="submit"] {
        padding: 8px 16px;
    }

    #btnEmpty {
        padding: 6px 10px;
    }
}

    </style>
</head>
<body>

<!-- Exibição da galeria de produtos -->
<div id="product-gallery">
    <br><br>
    <h2>Produtos Disponíveis</h2>
    <?php if (!empty($product_array)) { ?>
        <?php foreach ($product_array as $product) { ?>
            <div class="product-item">
                <form method="post" action="carrinho.php?action=add&code=<?php echo $product['code']; ?>">
                    <div class="product-image"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"></div>
                    <div class="product-title"><?php echo $product['name']; ?></div>
                    <div class="product-price">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></div>
                    <div class="cart-action">
                        <input type="number" class="product-quantity" name="quantity" value="1" min="1" size="2" /> <br><br>
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

    <a id="btnEmpty" href="carrinho.php?action=empty">Esvaziar Carrinho</a>

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
                        <td><a href="carrinho.php?action=remove&code=<?php echo $item['code']; ?>" class="btnRemoveAction">Remover</a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" align="right">Total:</td>
                    <td colspan="2"><strong>R$ <?php echo number_format($total_price, 2, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Botão de finalizar pedido -->
        <form method="post" action="carrinho.php?action=place_order">
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
