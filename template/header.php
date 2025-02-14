<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <title>Pampa Grill</title>
</head>
<style>
    /* Estilo exclusivo para o site Pampa Grill */
    
.custom-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    min-width: 100%;
    padding: 20px;
    border-bottom: 1px solid #c96823;
}

.header-left {
    display: flex;
    align-items: center;
}

.logo-link {
    text-decoration: none;
    display: inline-flex;
}

.logo-img {
    width: 100px;
    height: 100px;
}

.header-title {
    margin-left: 15px;
    color: #c96823;
    font-size: 28px;
    font-family: 'Arial', sans-serif;
}

.header-right {
    display: flex;
    gap: 15px;
    align-items: center;
}

.custom-btn {
    background-color: transparent;
    border: 2px solid #c96823;
    color: #c96823;
    padding: 8px 16px;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-link {
    text-decoration: none;
    color: inherit;
}

.search-bar {
    display: flex;
    align-items: center;
    border: 2px solid #c96823;
    border-radius: 25px;
    overflow: hidden;

}

.search-input {
    flex: 1;
    padding: 10px;
    border: none;
    outline: none;
    font-size: 16px;
}

.search-button {
    background-color: #c96823;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.search-button:hover {
    background-color: #8c4515;
}

.header-right button a{
    text-decoration: none;
    color:  #c96823;
}
.header-right button :hover{
    color:  #B35C1E;
}


</style>
<body>

    <header class="custom-header">
        <div class="header-left">
            <a href="../../../churrascaria/index.php" class="logo-link">
                <img src="img/download.png" class="logo-img" alt="Pampa Grill">
            </a>
            <h2 class="header-title">Pampa Grill</h2>
        </div>

        <div class="header-right">
            
        <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Menu
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="bebidas.php">Bebidas</a></li>
      <li><a class="dropdown-item" href="cortes.php">Cortes</a></li>
      <li><a class="dropdown-item" href="entrada.php">Entradas</a></li>
      <li><a class="dropdown-item" href="acompanhamento.php">Acompanhamentos</a></li>
      <li><a class="dropdown-item" href="sobremesa.php">Sobremesas</a></li>
      <li><a class="dropdown-item" href="pedido.php">Mais Pedidos</a></li>
      <li><a class="dropdown-item" href="index.php">Home</a></li>
    </ul>
  </div>
            <button type="button" class="btn custom-btn"><a href="../churrascaria/carrinhosimples/carrinho.php" class="btn-link">Carrinho de Compras</a></button>
            <button type="button" class="btn custom-btn"><a href="#" class="btn-link">Reserva</a></button>


            <button type="button" class="btn custom-btn"><a href="#" class="btn-link">Login</a></button>
            <button type="button" class="btn custom-btn"><a href="#" class="btn-link">Sign-up</a></button>
        </div>
    </header>

<script>
function searchSite() {
    const query = document.getElementById("search-input").value.trim();
    if (query) {
        window.location.href = `index.php?q=${encodeURIComponent(query)}`;
    } else {
        alert("Por favor, digite algo para pesquisar.");
    }
}
</script>

</body>
</html>
