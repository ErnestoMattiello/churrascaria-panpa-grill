
<?php
include_once '../Churrascaria/header.php'
?>

<head>
    <title>Pampa Grill</title>
    <link rel="stylesheet" href="../churrascaria/css/bebidas.css"> <!-- Atualizado para a pasta css -->
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
<br><br><br>
    <div class="parallax">
        <video autoplay muted loop class="video-background">
            <source src="img/toma.mp4" type="video/mp4"> <!-- Atualizado para a pasta img -->
            Seu navegador não suporta o elemento de vídeo.
        </video>
        <div class="content">
            <h1>Explore os cortes de carne mais saborosos, preparados com todo o cuidado e paixão, para uma experiência gastronômica inesquecível!</h1>
        </div>
    </div>
    
    <div class="cortes">
    <section class="testimonials">
    <div class="container">
        <h1 class="text-center" style="color: white">Nossos Cortes</h1>
        <div id="customers-testimonials" class="owl-carousel">
            <!-- Testemunho 1 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/picanha.webp" alt="Picanha">
                    <div class="item-details">
                        <h5>Picanha <span style="color: black">R$ 59,90</span></h5>
                        <p>Corte suculento e macio, perfeito para churrasco, com uma camada de gordura que deixa o sabor ainda mais marcante.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 2 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/fraldinha.jpeg" alt="Fraldinha">
                    <div class="item-details">
                        <h5>Fraldinha <span style="color: black">R$ 49,90</span></h5>
                        <p>Carne macia e saborosa, ideal para grelhar ou assar, acompanhada de molho especial.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 3 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/Costela.jpg" alt="Costela de Boi">
                    <div class="item-details">
                        <h5>Costela com barbecue <span style="color: black">R$ 79,90</span></h5>
                        <p>Costela cozida lentamente até ficar macia, ideal para quem aprecia carne suculenta e cheia de sabor.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 4 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/alcatra.jpg" alt="Alcatra">
                    <div class="item-details">
                        <h5>Alcatra <span style="color: black">R$ 54,90</span></h5>
                        <p>Carne suculenta e macia, perfeita para grelhar ou preparar no espeto.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 5 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/maminha.jpg" alt="Maminha">
                    <div class="item-details">
                        <h5>Maminha <span style="color: black">R$ 69,90</span></h5>
                        <p>Uma carne macia e saborosa, excelente para assar inteira ou cortar em bifes suculentos.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 6 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/frango.jpg" alt="Frango Grelhado">
                    <div class="item-details">
                        <h5>Frango Grelhado <span style="color: black">R$ 24,90</span></h5>
                        <p>Peito de frango grelhado, uma opção saudável e saborosa, ideal para quem procura uma refeição leve.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 7 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/coraçao.jpg" alt="Coração de Frango">
                    <div class="item-details">
                        <h5>Coração de Frango <span style="color: black">R$ 19,90</span></h5>
                        <p>Pequenos e suculentos, com um tempero especial para um sabor inconfundível, perfeito para churrasco.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 8 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/linguiça.jpeg" alt="Linguiça Artesanal">
                    <div class="item-details">
                        <h5>Linguiça Artesanal <span style="color: black">R$ 29,90</span></h5>
                        <p>Feita com carnes selecionadas e temperos especiais, é ideal para quem adora um bom churrasco.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 9 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/pernil.png" alt="Pernil de Cordeiro">
                    <div class="item-details">
                        <h5>Pernil de Cordeiro <span style="color: black">R$ 99,90</span></h5>
                        <p>Uma carne macia e cheia de sabor, com um tempero delicado que realça sua suculência.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 10 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/cupim.jpg" alt="Cupim">
                    <div class="item-details">
                        <h5>Cupim <span style="color: black">R$ 79,90</span></h5>
                        <p>Carne super macia, que desmancha na boca, perfeita para ser assada ou grelhada na churrasqueira.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 11 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/tomahawk.webp" alt="Picanha de Cordeiro">
                    <div class="item-details">
                        <h5>Tomahawk <span style="color: black">R$ 129,90</span></h5>
                        <p>É um corte nobre de carne bovina com osso longo, ideal para grelhar na brasa. Seu sabor intenso e suculência única a tornam perfeita para ocasiões especiais.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 12 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/ancho.jpg" alt="Bife Ancho">
                    <div class="item-details">
                        <h5>Bife Ancho <span style="color: black">R$ 59,90</span></h5>
                        <p>Tradicional corte argentino, suculento e macio, ideal para grelhar e saborear um excelente prato.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 13 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/lombo.jpg" alt="T-bone">
                    <div class="item-details">
                        <h5>Lombo Suíno <span style="color: black">R$ 45,90</span></h5>
                        <p>Corte suculento de carne suína, com um sabor marcante e ideal para um bom churrasco.</p>
                    </div>
                </div>
            </div>
            <!-- Testemunho 14 -->
            <div class="item">
                <div class="shadow-effect">
                    <img class="img-responsive" src="img/mignon.jpg" alt="Filé-Mignon Suíno">
                    <div class="item-details">
                        <h5>Filé-Mignon Suíno <span style="color: black">R$ 42,90</span></h5>
                        <p>Corte suculento e macio, ideal para grelhar ou preparar no espeto. Perfeito para um churrasco delicioso.</p>
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