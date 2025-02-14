<?php
include_once '../Churrascaria/header.php'
?>

<head>
<title>Pampa Grill - Bebidas</title> <!-- Título adicionado -->
<link rel="stylesheet" href="css/bebidas.css">
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.default.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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

    .btn-link {
  color: #007bff;
  text-decoration: none;
}

.btn-link:hover {
  text-decoration: underline;
  color: #0056b3;
}
</style>
<br><br><br>
    <div class="parallax">
        <video autoplay muted loop class="video-background">
            <source src="../churrascaria/img/bebidas3.mp4" type="video/mp4"> <!-- Caminho atualizado para a pasta img -->
            Seu navegador não suporta o elemento de vídeo.
        </video>
        <div class="content">
            <h1>Explore uma seleção das melhores bebidas, preparadas com todo o cuidado e paixão para complementar sua refeição de maneira inesquecível!</h1>
        </div>
    </div>

<div class="bebidas">
<section class="testimonials">
  <div class="container">
    <h1 class="text-center" style="color: white">Nossas Bebidas</h1>
    <div id="customers-testimonials" class="owl-carousel">
      <!-- Testemunho 1 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/suco.jpeg" alt="Suco">
          <div class="item-details">
            <h5>Suco <span style="color: black"></span></h5>
            <p>Refrescante e natural, perfeito para quem busca uma opção saudável.</p>
            <a href="suco.php" class="btn btn-link" style="color: white">Clique Aqui</a>
          </div>
        </div>
      </div>
      <!-- Testemunho 2 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/refri2.jpg" alt="Refrigerante">
          <div class="item-details">
            <h5>Refrigerante <span style="color: black"></span></h5>
            <p>Refrescante e perfeito para acompanhar seu prato favorito.</p>
            <a href="refri.php" class="btn btn-link" style="color: white">Clique Aqui</a>
          </div>
        </div>
      </div>
      <!-- Testemunho 3 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/cerveja.jpg" alt="Cerveja">
          <div class="item-details">
            <h5>Cerveja <span style="color: black"></span></h5>
            <p>Uma cerveja gelada para saborear em boa companhia.</p>
            <a href="cerveja.php" class="btn btn-link" style="color: white">Clique Aqui</a>
          </div>
        </div>
      </div>
      <!-- Testemunho 4 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/jack.jpg" alt="Whisky">
          <div class="item-details">
            <h5>Whisky <span style="color: black"></span></h5>
            <p>Para os apreciadores de bebidas destiladas, uma escolha refinada.</p>
            <a href="whisky.php" class="btn btn-link" style="color: white">Clique Aqui</a>
          </div>
        </div>
      </div>
      <!-- Testemunho 5 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/vinho.webp" alt="Vinho">
          <div class="item-details">
            <h5>Vinho <span style="color: black"></span></h5>
            <p>Para os momentos especiais, um bom vinho tinto ou branco.</p>
            <a href="vinho.php" class="btn btn-link" style="color: white">Clique Aqui</a>
          </div>
        </div>
      </div>
      <!-- Testemunho 6 -->
      <div class="item">
        <div class="shadow-effect">
          <img class="img-responsive" src="img/caipirinha.avif" alt="Vinho">
          <div class="item-details">
            <h5>Caipirinha <span style="color: black"></span></h5>
            <p>Sua combinação simples e deliciosa das frutas com a intensidade da cachaça.</p>
            <a href="caipirinha.php" class="btn btn-link" style="color: white">Clique Aqui</a>
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