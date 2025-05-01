<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda Solidária</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar show-menu">
        <div class="header-inner-content">
            <h1 class="logo">Ajuda <span>Solidária</span></h1>
            <nav>
                <ul>
                    <li><a href="itens/formulario-item.php">Cadastrar Itens</a></li>
                    <li><a href="solicitacoes/formulario-solicitacao.php">Solicitar Ajuda</a></li>
                    <li><a href="eventos/formulario-evento.php">Cadastrar Eventos</a></li>
                    <li> <a href="sair.php">Sair</a></li>
                </ul>
            </nav>
            <div class="nav-icon-container">
                <img src="img/menu-icon-png.png" class="menu-button">
            </div>
        </div>
    </div>
    <header>
        <div class="header-inner-content">
            <div class="header-bottom-side">
                <div class="header-bottom-side-left">
                    <h2>Faça parte do Ajuda Solidária</h2>
                    <p>Ajude e seja ajudado! Doe o que puder, pegue o que precisar.</p>
                    <button><a href="itens/formulario-item.php">Fazer uma Doação</a></button>
                </div>
                <div class="header-bottom-side-right">
                    <img src="img/people-holding-rubber-heart.jpg">
                </div>
            </div>
        </div>
    </header>

    <!--Main content-->
    <main>
        <div class="phrases-background">
            <div class="page-inner-content">
                <div class="cols cols-3">
                    <img src="ajeita-depois.png">
                    <img src="ajeita-depois.png">
                    <img src="ajeita-depois.png">
                </div>
            </div>
        </div>
        <div>
            <div class="page-inner-content">
                <h3 class="section-title">Itens Doados</h3>
                <div class="subtitle-underline"></div>
                <div class="cols cols-4">
                <div class="item">
                    <p class="item-name">Nome: </p>
                    <p class="desc-item">Descrição: </p>
                    <p class="desc-item">Quantidade:</p>
                    <p class="desc-item">Status: </p>
                    <p class="desc-item">Doado por: </p>

                </div>
        </div>
        <div class="main-content">
        <a href="itens/itens-cadastrados.php" class="botao-centralizado">Ver Todos os Itens</a>
        </div>
                </div>
            </div>
        </div>
        <div class="page-inner-content">
            <h3 class="section-title">Solicitações de Ajuda</h3>
            <div class="subtitle-underline"></div>
            <div class="cols cols-4" >
                    <div class="item">
                        <h3>Postado por: </h3>
                        <p class="desc-item"> </p>
                        <p><strong>Estado:</strong> </p>
                    </div>
        </div>
        <div class="main-content">
        <a href="solicitacoes/solicitacoes.php" class="botao-centralizado">Ver Todas as Solicitações</a>
        </div>
        </div>
        <div class="page-inner-content">
            <h3 class="section-title">Eventos</h3>
            <div class="subtitle-underline"></div>
            <div class="cols cols-4">
                    <div class="item">
                        <h3>Nome do Evento: </h3>
                        <p class="desc-item"> Descrição</p>
                        <p>Data: </p>
                        <p>Endereço: </p>
                    </div>
        </div>
    </div>
    <div class="main-content">
        <a href="eventos/eventos.php" class="botao-centralizado">Ver Todos os Eventos</a>
        </div>
    </main>


    <script>
        const navbar = document.querySelector(".navbar");
        const menuButton = document.querySelector(".menu-button");

        menuButton.addEventListener('click', () =>{
            navbar.classList.toggle("show-menu");
        })
    </script>

</body>
</html>