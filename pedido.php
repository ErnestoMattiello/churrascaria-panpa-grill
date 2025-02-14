
<?php
include_once '../Churrascaria/header.php'
?>

<head>
    <title>Pampa Grill</title>
    <link rel="stylesheet" href="../churrascaria/css/pedido.css"> <!-- Atualizado para a pasta css -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.default.min.css">
  
<style>
    /* Container da seção de Depoimentos */
    .testimonials {
      background-color: #f8f8f8;
      padding: 50px 0;
    }

    .container {
      width: 80%;
      margin: auto;
    }

    .item {
      text-align: center;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 10px;
    }

    .item img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .item-details {
      padding-top: 20px;
    }

    .item-details h5 {
      font-size: 18px;
      font-weight: bold;
    }

    .item-details span {
      color: #f76c6c;
    }

    .item-details p {
      color: #555;
      font-size: 14px;
    }
    
    /* Sombra para efeito */
    .shadow-effect {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Estilo para as setas de navegação */
    .owl-prev, .owl-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      padding: 10px;
      border-radius: 50%;
      font-size: 20px;
      z-index: 10;
      cursor: pointer;
    }

    .owl-prev {
      left: 10px;
    }

    .owl-next {
      right: 10px;
    }

    .owl-prev:hover, .owl-next:hover {
      background-color: rgba(0, 0, 0, 0.7);
    }
    
    .left-aligned {
    position: absolute;
    left: 0;
  }
  </style>
  <br><br><br>
    <div class="parallax">
        <video autoplay muted loop class="video-background">
            <source src="img/video.mp4" type="video/mp4"> <!-- Atualizado para a pasta img -->
            Seu navegador não suporta o elemento de vídeo.
        </video>
        <div class="content">
            <h1>Cada um desses pratos foi elaborado com muito carinho para garantir que sua refeição seja uma verdadeira celebração de sabores!</h1>
        </div>
    </div>
    
    <div class="cortes">
    <section id="cortes" class="menu-section">
    <h1 style="color: white">Itens Mais Pedidos</h1>
    
    <div class="menu-item">
        <img src="img/Costela.jpg" alt="Corte Premium" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Costela com barbecue</p> 
        <p style="color: white">Por R$ 79,90</p>
    </div>
    
    <div class="menu-item">
        <img src="img/tomahawk.webp" alt="Corte Especial" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Tomahawk</p>
        <p style="color: white">R$ 129,90</p>
    </div>
    
    <div class="menu-item">
        <img src="img/picanha.webp" alt="Corte do Chef" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Picanha</p>
        <p style="color: white">Por R$ 59,99</p>
    </div>
    
    <div class="menu-item">
        <img src="img/pudim.png" alt="Corte Especial" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Pudim de Leite Condensado</p>
        <p style="color: white">Por R$ 12,50</p>
    </div>
    
    <div class="menu-item">
        <img src="img/bruschetta.jpg" alt="Corte Premium" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Bruschetta de Tomate e Manjericão</p>
        <p style="color: white">Por R$ 18,90</p>
    </div>
    
    <div class="menu-item">
        <img src="img/arroz.jpg" alt="Corte do Chef" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Arroz à Grega</p>
        <p style="color: white">Por R$ 19,90</p>
    </div>
    
    <div class="menu-item">
        <img src="img/heineken.webp" alt="Corte Premium" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Heineken</p>
        <p style="color: white">Por R$ 12,00</p>
    </div>
    
    <div class="menu-item">
        <img src="img/branco.avif" alt="Corte Especial" class="menu-image" style="width: 200px; height: 200px">
        <br><br>
        <p style="color: white">Vinho Branco Chardonnay</p>
        <p style="color: white">R$ 69,90</p>
    </div> <br>
    <div class="btn-group float-right" role="group" >
  <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle float-left" data-bs-toggle="dropdown" aria-expanded="false">
    Cardápio
  </button>
  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    <li><a class="dropdown-item" href="acompanhamento.php">Acompanhamento</a></li>
    <li><a class="dropdown-item" href="bebidas.php">Bebidas</a></li>
    <li><a class="dropdown-item" href="cortes.php">Cortes</a></li>
    <li><a class="dropdown-item" href="entrada.php">Entradas</a></li>
    <li><a class="dropdown-item" href="sobremesa.php">Sobremesa</a></li>
    <li><a class="dropdown-item" href="pedido.php">Mais Pedidos</a></li>
    <li><a class="dropdown-item" href="index.php">Home</a></li>
  </ul>
</div>
</section>
</div>
  <!-- Fim da seção de Depoimentos -->

  <!-- Scripts do Owl Carousel e jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  
  <!-- Script para inicializar o Owl Carousel -->
  <script>
    $(document).ready(function(){
      $("#customers-testimonials").owlCarousel({
        items: 3,  // Número de itens exibidos ao mesmo tempo
        itemsDesktop: [1199, 2],  // Quantos itens em telas grandes
        itemsDesktopSmall: [991, 1],  // Quantos itens em telas médias
        itemsTablet: [768, 1],  // Quantos itens em tablets
        itemsMobile: [479, 1],  // Quantos itens em dispositivos móveis
        navigation: true,  // Habilita navegação
        pagination: false,  // Desabilita paginação
        autoPlay: true,  // Ativa a rotação automática
        stopOnHover: true,  // Pausa ao passar o mouse
        navigationText: ["", ""],  // Desabilita o texto dos botões
        rewindNav: true,  // Garante que o carousel vai e volta
        loop: true  // Faz o carousel ir para o fim e voltar ao primeiro item
      });
    });
  </script>

<?php
    include_once('footer.php');
?>