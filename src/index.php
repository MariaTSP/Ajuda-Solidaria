<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if (isset($_GET['error']) && $_GET['error'] == 'true') {
        echo "<script>
            alert('Somente organizações podem cadastrar eventos.');
        </script>";
    }

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);        
        header('Location: login/formulario-login.php');
    }
    $logado = $_SESSION['email'];
    $id_usuario = $_SESSION['id'];

//-----------------Itens--------------------------------------

    $sqlItens = "SELECT itens.*, usuarios.nome AS nome_doador FROM itens INNER JOIN usuarios ON itens.id_usuario = usuarios.id ORDER BY id DESC LIMIT 4";
    $resultItens = $conexao->query($sqlItens);
    $itens =[];
    if($resultItens-> num_rows >0){
        while($row = $resultItens ->fetch_assoc()){
            $itens[] = $row;
        }
    }

//----------------solicitacoes--------------------------------

    $sqlSolicitacoes = "SELECT s.descricao, s.estado, u.nome as nome_solicitante FROM solicitacoes s INNER JOIN usuarios u ON s.id_usuario = u.id ORDER BY s.id DESC LIMIT 4";

    $resultSolicitacoes = $conexao->query($sqlSolicitacoes);
    $solicitacoes = [];

    if($resultSolicitacoes->num_rows > 0)
    {
        while($row = $resultSolicitacoes->fetch_assoc())
        {
            $solicitacoes[] = $row;
        }
    }

//----------------------eventos-------------------------------
$sqlEventos = "SELECT nome, descricao, data, endereco FROM eventos ORDER BY id DESC LIMIT 4";

$resultEventos = $conexao->query($sqlEventos);
$eventos = [];

if($resultEventos->num_rows > 0)
{
    while($row = $resultEventos->fetch_assoc())
    {
        $eventos[] = $row;
    }
}
?>

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
                    <figure>
                    <img src="img/people-holding-rubber-heart.jpg">
                    <figcaption style="text-align: right;">Designed By <a href="https://www.freepik.com/free-photo/people-holding-rubber-heart_5598505.htm" target="_blank" style="  text-decoration: none; color: #2471a3">Freepik</a></figcaption>
                    </figure>
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
                <?php if (!empty($itens)): ?>
                <?php foreach ($itens as $item): 
                    $caminhoImagem = (!empty($item['caminho_imagem']) && file_exists('uploads/' . $item['caminho_imagem'])) 
                        ? 'uploads/' . $item['caminho_imagem'] 
                        : 'uploads/imagem-padrao.jpg';
                ?>
                <div class="item">
                    <img src="<?php echo $caminhoImagem; ?>" alt="Imagem do item" style="width: 250px; height: auto; object-fit:contain;">
                    <p class="item-name"><?php echo ($item['nome']); ?></p>
                    <p class="desc-item"><?php echo ($item['descricao']); ?></p>
                    <p class="desc-item">Quantidade: <?php echo ($item['quantidade']); ?></p>
                    <p class="desc-item">Status: <?php echo ($item['estado']); ?></p>
                    <p class="desc-item">Doado por: <?php echo ($item['nome_doador']); ?></p>

                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="mensagem-centralizada">Nenhum item cadastrado ainda.</p>
            <?php endif; ?>
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
            <?php 
            if (count($solicitacoes) > 0): 
                foreach ($solicitacoes as $sol): ?>
                    <div class="item">
                        <h3>Postado por: <?php echo $sol['nome_solicitante']; ?></h3>
                        <p class="desc-item"><?php echo $sol['descricao']; ?></p>
                        <p><strong>Estado:</strong> <?php echo $sol['estado']; ?></p>
                    </div>
                <?php endforeach; 
            else: ?>
                <p class="mensagem-centralizada">Nenhuma solicitação cadastrada ainda.</p>
            <?php endif; ?>
        </div>
        <div class="main-content">
        <a href="solicitacoes/solicitacoes.php" class="botao-centralizado">Ver Todas as Solicitações</a>
        </div>
        </div>
        <div class="page-inner-content">
            <h3 class="section-title">Eventos</h3>
            <div class="subtitle-underline"></div>
            <div class="cols cols-4">
            <?php if (count($eventos) > 0): ?>
                <?php foreach ($eventos as $evento): ?>
                    <div class="item">
                        <h3><?php echo $evento['nome'];?></h3>
                        <p class="desc-item"> <?php echo $evento['descricao'];?></p>
                        <p>Data: <?php echo date('d/m/Y', strtotime($evento['data'])); ?></p>
                        <p>Endereço: <?php echo $evento['endereco'];?></p>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p class="mensagem-centralizada">Nenhum evento cadastrado ainda.</p>
            <?php endif; ?>

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