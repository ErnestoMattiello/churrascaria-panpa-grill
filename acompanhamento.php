
<?php
include_once '../Churrascaria/header.php'
?>

<head>
    <title>Pampa Grill</title>
    <link rel="stylesheet" href="css/acompanhamento.css"> <!-- Atualizado para a pasta css -->
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
      box-shadow: 10px 10px 5px  rgb(255, 143, 15);
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
  </style>
  <br><br>
    <section class="testimonials">
    <div class="container">
        <h1 class="text-center" style="color: white">Nossos Acompanhamentos</h1>
        <div id="customers-testimonials" class="owl-carousel">
            <!-- Testemunho 1 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/arroz.jpg" alt="Picanha">
                    <div class="item-details">
                        <h5>Arroz à Grega <span style="color: black">R$ 19,90</span></h5>
                        <p>Arroz à Grega é uma combinação leve e deliciosa de legumes coloridos, passas e ervas, que harmoniza perfeitamente com qualquer tipo de carne.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 2 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/feijao.jpg" alt="Fraldinha">
                    <div class="item-details">
                        <h5>Feijão Tropeiro <span style="color: black">R$ 24,90</span></h5>
                        <p>Feijão Tropeiro é uma explosão de sabor, preparado com feijão carioca, farinha de mandioca, torresmo, ovo e temperos especiais, perfeito para acompanhar o churrasco.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 3 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/farofa.jpg" alt="Alcatra">
                    <div class="item-details">
                        <h5>Farofa Especial <span style="color: black">R$ 12,90</span></h5>
                        <p>Farofa crocante e saborosa, preparada com ingredientes frescos como manteiga, cebola, alho e bacon. Ideal para dar aquele toque final à carne e deixar o prato ainda mais irresistível.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 4 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/vinagrete.webp" alt="Maminha">
                    <div class="item-details">
                        <h5>Vinagrete <span style="color: black">R$ 10,00</span></h5>
                        <p>Vinagrete refrescante, com tomates, cebolas, pimentões e um leve toque de vinagre e azeite. Uma combinação perfeita para balancear os sabores do churrasco e dar frescor a cada mordida.</p>
                    </div>
                </div>
            </div>
            </div> <br>
            <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
        </div>
    </div>
</section>



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