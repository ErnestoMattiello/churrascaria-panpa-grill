<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Pampa Grill</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); 
        * {
            font-family: "Poppins", sans-serif;
        }

        /* Estilo específico para o site Pampa Grill */
        .pampa-grill-header {
            background-color: #333;
            padding: 10px;
            border-bottom: 1px solid #c96823;
            position: fixed;  /* Fixa o header no topo da página */
            top: 0;  /* Fixa o header no topo */
            left: 0;  /* Alinha o header à esquerda */
            right: 0;  /* Alinha o header à direita */
            z-index: 9999;  /* Garante que o header fique acima de outros elementos */
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
            font-size: 32px;
        }

        .header-right {
            display: flex;
            justify-content: end;
            gap: 30px;
        }

        .btn-link {
            text-decoration: none;
            color: inherit;
        }

        .custom-btn a {
            text-decoration: none;
            color: #c96823;
            font-size: 17px;
        }

        .custom-btn a:hover {
            color: #c96823;
        }

        /* Adiciona espaço no topo para não ficar escondido atrás do header fixo */
        body {
            padding-top: 100px; /* Ajuste o valor conforme a altura do seu header */
        }

    </style>
</head>
<body>

    <header class="pampa-grill-header container-fluid">
        <div class="col-md-12">
            <div class="row align-items-center">
                <div class="col-md-6 header-left">
                    <a href="../../../churrascaria/homelogado.php" class="logo-link">
                        <img src="../../../../churrascaria/img/download.png" class="logo-img" alt="Pampa Grill">
                    </a>
                    <h2 class="header-title">Pampa Grill</h2>
                </div>
                
                <div class="col-md-6 header-right">
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
                    <button type="button" class="btn custom-btn"><a href="../../../churrascaria/carrinho/carrinho.php" class="btn-link">Pedido</a></button>
                    <button type="button" class="btn custom-btn"><a href="../../../churrascaria/reserva/index.php" class="btn-link">Reserva</a></button>

                    <button type="button" class="btn custom-btn"><a href="../../../churrascaria/index.php" class="btn-link">Log Out</a></button>
                    
                    
                    
                </div>
            </div>
        </div>
    </header>
    
    <!-- Conteúdo da página -->
    <main>
        <!-- Seu conteúdo aqui -->
    </main>

</body>
</html>
