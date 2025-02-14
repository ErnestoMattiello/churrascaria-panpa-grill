<?php
include_once '../churrascaria/header.php'
?>

<head>
    <meta charset="UTF-8">
    <title>Pampa Grill</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <style>
      .custom-section, .contact-container {
            margin: 0; /* Remove margens das seções */
            padding: 20px; /* Adicione padding conforme necessário */
            max-width: 800px;
            margin: auto;
            background: none;
            padding: 10px;
            background-color: transparent;
        }

        .teste {
            margin-bottom: 0; /* Remove margens inferiores se necessário */
        }
    </style>
</head>
<body>
    


  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="150">
          <img src="img/WhatsApp Image 2024-10-29 at 07.44.29.jpeg" class="d-block w-100" style="height: 550px;" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="img/WhatsApp Image 2024-10-29 at 07.43.40.jpeg" class="d-block w-100" style="height: 550px;" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/WhatsApp Image 2024-10-29 at 07.46.11.jpeg" class="d-block w-100" style="height: 550px;" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>

  <div class="history-section">
    <h2 style="color: white">Pampa Grill, 1994</h2>
    <h2 style="color: white">NA ESCOLHA CUIDADOSA DA CARNE <br>
      NO RITUAL DO CORTE <br>
      NA TÉCNICA DE PREPARO <br>
      UMA EQUIPE DE ESPECIALISTAS</h2>
    <p style="color: white">
      Respeitando e valorizando a rica, vibrante e histórica tradição do churrasco, o Pampa Grill reúne experts para oferecer os melhores cortes de carne, desde 1990.
    </p> <br>
    <p style="color: white">
      Cozinhar carne sobre o fogo é uma das práticas mais ancestrais e evoca a alegria de reunir amigos e familiares. Os índios Guaranis, em suas celebrações, assavam carnes sobre brasas em grelhas de pedra, inspirando o nome da nossa casa.
    </p> <br>
    <p style="color: white">
      Essa conexão com os Guaranis, a tradição dos gaúchos, o barbecue americano e toda a cultura do churrasco são profundamente respeitados no Pampa Grill. O cuidado na seleção e no preparo das carnes se reflete em nosso serviço, proporcionando uma experiência única que só um verdadeiro churrasco pode oferecer.
    </p> <br>
  </div>

  <div class="rover-section">
    <h2>Nossos Estabelecimentos</h2>
    <div class="rover-item">
        <img src="../churrascaria/img/pampa 1.webp" alt="Corte 1" class="rover-image">
        <div class="rover-info">
            <h3>Pampa Grill</h3>
            <p>Balneário Camboriú</p>
        </div>
    </div>
    <div class="rover-item">
        <img src="../churrascaria/img/pampa 22.webp" alt="Corte 2" class="rover-image">
        <div class="rover-info">
            <h3>Pampa Grill</h3>
            <p>São Paulo</p>
        </div>
    </div>
    <div class="rover-item">
        <img src="../churrascaria/img/pampa 3.webp" alt="Corte 3" class="rover-image">
        <div class="rover-info">
            <h3>Pampa Grill</h3>
            <p>Rio de Janeiro</p>
        </div>
    </div>
</div>

    

    <div class="contact-info">
      <h1 style="color: black">Nossos Endereços</h1>
      <div class="row">
        <div class="col-md-4 location">
          <h3 style="color: black">BC</h3>
          <p style="color: black">Endereço: Rua Ypê, 123</p>
          <p style="color: black">Telefone: (47) 99999-9999</p>
        </div>
        <div class="col-md-4 location">
          <h3 style="color: black">SP</h3>
          <p style="color: black">Endereço: Rua 300, 456</p>
          <p style="color: black">Telefone: (11) 98888-8888</p>
        </div>
        <div class="col-md-4 location">
          <h3 style="color: black">RJ</h3>
          <p style="color: black">Endereço: Rua Five, 789</p>
          <p style="color: black">Telefone: (21) 97777-7777</p>
        </div>
      </div>
    </div>

    <div class="parallax">
      <div class="parallax-content">
      </div>
    </div>

 

  
    <?php
    include_once('footer.php');
?>