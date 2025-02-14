<style>
    .footer .nav-item img {
      width: 40px;
      height: 40px;
    }
    /* Contêiner principal da seção de endereços */
.contact-info {
    background-image: url('../../churrascaria/img/2 atualizado.png');
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #c9b849;
    text-align: center;
    padding: 20px;
    margin: 0; /* Remove margens externas */
    border: none; /* Remove bordas */
}



/* Container de endereços */
.contact-info .row {
    display: flex; /* Flexbox para alinhar as colunas */
    justify-content: center; /* Centraliza as colunas */
    gap: 30px; /* Espaçamento entre as colunas */
    flex-wrap: wrap; /* Garante que o conteúdo se reorganize em telas menores */
}

/* Cada bloco de localização */
.contact-info .location {
    background-color: rgba(0, 0, 0, 0.5); /* Fundo semi-transparente */
    color: white; /* Cor do texto */
    padding: 20px;
    border-radius: 10px; /* Bordas arredondadas */
    width: 310px; /* Define um tamanho fixo para cada coluna */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adiciona sombra */
    text-align: left; /* Alinha o texto à esquerda */
}

.contact-info .location h3 {
    font-size: 1.8rem;
    margin-bottom: 10px;
    color: #c9b849;
    font-weight: bold;
}

.contact-info .location p {
    font-size: 1.2rem;
    margin-bottom: 8px;
    color: #fff;
}

/* Responsividade: ajusta a largura das colunas em telas menores */
@media (max-width: 768px) {
    .contact-info .row {
        flex-direction: column; /* Organiza as colunas verticalmente */
        gap: 20px; /* Espaço reduzido entre as colunas em dispositivos móveis */
    }

    .contact-info .location {
        width: 100%; /* Faz com que cada item ocupe 100% da largura em telas pequenas */
    }
}

</style>


    <div class="contact-info">
      <h1>Nossos Endereços</h1>
      <div class="row">
        <div class="col-md-4 location">
          <h3>BC</h3>
          <p>Endereço: Rua Ypê, 123</p>
          <p>Telefone: (47) 99999-9999</p>
        </div>
        <div class="col-md-4 location">
          <h3>SP</h3>
          <p>Endereço: Rua 300, 456</p>
          <p>Telefone: (11) 98888-8888</p>
        </div>
        <div class="col-md-4 location">
          <h3>RJ</h3>
          <p>Endereço: Rua Five, 789</p>
          <p>Telefone: (21) 97777-7777</p>
        </div>
      </div>
    </div>
<div class="bg-dark">
  <footer class="footer ">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 social-icons">
      <li class="nav-item"><a href="#" class="nav-link"><img src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_facebook-512.png" alt=""></a></li>
      <li class="nav-item"><a href="#" class="nav-link"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Instagram_colored_svg_1-512.png" alt=""></a></li>
      <li class="nav-item"><a href="#" class="nav-link"><img src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo-whatsapp-256.png" alt=""></a></li>
      <li class="nav-item"><a href="#" class="nav-link"><img src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_twitter-256.png" alt=""></a></li>
    </ul>
    <p class="text-center text-body-secondary" style="color:white;">© 2024 Company, Inc</p>
 
  </footer>
</div>

</body>
</html>