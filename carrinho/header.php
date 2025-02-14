<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Pampa Grill</title>
</head>
<style>
    /* Estilo específico para o site Pampa Grill */
    .pampa-grill-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        width: 100%;
        padding: 20px;
        border-bottom: 1px solid #c96823;
    }

    .pampa-grill-header .header-left {
        display: flex;
        align-items: center;
    }

    .pampa-grill-header .logo-link {
        text-decoration: none;
        display: inline-flex;
    }

    .pampa-grill-header .logo-img {
        width: 100px;
        height: 100px;
    }

    .pampa-grill-header .header-title {
        margin-left: 15px;
        color: #c96823;
        font-size: 28px;
        font-family: 'Arial', sans-serif;
    }

    .pampa-grill-header .header-right {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .pampa-grill-header .custom-btn {
        background-color: transparent;
        border: none;
        color: #c96823;
        padding: 8px 16px;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .pampa-grill-header .btn-link {
        text-decoration: none;
        color: inherit;
    }

    .pampa-grill-header .search-bar {
        display: flex;
        align-items: center;
        border: none;
        border-radius: 25px;
        overflow: hidden;
    }

    .pampa-grill-header .search-input {
        flex: 1;
        padding: 10px;
        border: none;
        outline: none;
        font-size: 16px;
    }

    .pampa-grill-header .search-button {
        background-color: #c96823;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .pampa-grill-header .search-button:hover {
        background-color: #8c4515;
    }

    .pampa-grill-header .search-message {
        color: red;
        display: none;
    }

    .pampa-grill-header .header-right button a {
        text-decoration: none;
        color: #c96823;
    }

    .pampa-grill-header .header-right button:hover {
        color: #B35C1E;
    }
</style>
<body>

    <header class="pampa-grill-header">
        <div class="header-left">
            <a href="../../../churrascaria/index.php" class="logo-link">
                <img src="../../../../churrascaria/img/download.png" class="logo-img" alt="Pampa Grill">
            </a>
            <h2 class="header-title">Pampa Grill</h2>
        </div>

        <div class="header-right">
            <button type="button" class="btn custom-btn"><a href="../../../churrascaria/carrinho/carrinho.php" class="btn-link">Carrinho de Compras</a></button>
            <button type="button" class="btn custom-btn"><a href="../../../churrascaria/reserva/index.php" class="btn-link">Reserva</a></button>

            <div class="search-bar">
                <input type="text" id="search-input" class="search-input" placeholder="Buscar no site..." aria-label="Campo de pesquisa">
                <button class="search-button" onclick="searchSite()">🔍</button>
            </div>
            <p id="search-message" class="search-message">Nenhuma correspondência encontrada.</p>

            <?php if (isset($_SESSION['user_id'])): ?>
                <button type="button" class="btn custom-btn"><a href="logout.php" class="btn-link">Logout</a></button>
            <?php else: ?>
                <button type="button" class="btn custom-btn"><a href="../../churrascaria/login.php" class="btn-link">Login</a></button>
                <button type="button" class="btn custom-btn"><a href="../../churrascaria/cadastro.php" class="btn-link">Sign-up</a></button>
            <?php endif; ?>
        </div>
    </header>

    <script>
        function searchSite() {
            const query = document.getElementById("search-input").value.trim().toLowerCase();
            const searchMessage = document.getElementById("search-message");
            searchMessage.style.display = "none"; // Oculta a mensagem de 'não encontrado' inicialmente

            if (query) {
                let found = false;
                // Procura em todos os elementos de seção que tenham a classe 'searchable'
                const sections = document.querySelectorAll('.searchable');

                sections.forEach(section => {
                    if (section.textContent.toLowerCase().includes(query)) {
                        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        section.style.backgroundColor = '#c96823'; // Destaque visual
                        found = true;

                        // Remove o destaque após um tempo
                        setTimeout(() => {
                            section.style.backgroundColor = '';
                        }, 1000);
                    }
                });

                if (!found) {
                    searchMessage.style.display = "block"; // Exibe a mensagem de "não encontrado"
                }

            } else {
                alert("Por favor, digite algo para pesquisar.");
            }
        }

        // Ativa a busca quando pressionar "Enter"
        document.getElementById("search-input").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                searchSite();
            }
        });
    </script>

</body>
</html>