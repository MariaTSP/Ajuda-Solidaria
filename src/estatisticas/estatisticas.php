<?php
session_start();
include_once('../config.php');

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/formulario-login.php');
}
$logado = $_SESSION['email'];

// Total de itens
$sqlTotalItens = "SELECT COUNT(*) as total FROM itens";
$resultItens = $conexao->query($sqlTotalItens);
$totalItens = $resultItens->fetch_assoc()['total'];

// Total de solicitações
$sqlTotalSolicitacoes = "SELECT COUNT(*) as total FROM solicitacoes";
$resultSolicitacoes = $conexao->query($sqlTotalSolicitacoes);
$totalSolicitacoes = $resultSolicitacoes->fetch_assoc()['total'];

// Total de eventos
$sqlTotalEventos = "SELECT COUNT(*) as total FROM eventos";
$resultEventos = $conexao->query($sqlTotalEventos);
$totalEventos = $resultEventos->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estatísticas</title>
    <link rel="stylesheet" href="../css/formularios.css">
    <style>
        .relatorio-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .relatorio-box {
            background-color: #f0f0f0;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
            height: auto;
        }
        .relatorio-box h3 {
            margin-bottom: 0.5rem;
        }
        .botao-centralizado {
            background-color: #2F4F4F;
            border: none;
            cursor: pointer;
            padding: 0.8rem 3.8rem;
            border-radius: 9999px;
            color: white;
            font-weight: 500;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-block;
        }

        .botao-centralizado:hover{
            background-color: #008080;
        }
        .logo{
            color: #008080;
        }
        .logo span{
            color: #2F4F4F;
        }
        #estatistica{
            color:black;
        }
        #ajuda-solidaria{
            border-radius: 9px;
            padding: 3px;
            color:  #008080;
            background-color:rgba(90, 179, 90, 0.54);
        }
    </style>
</head>
<body>
    <div class="relatorio-container">
        <h2 class="logo"><span id="estatistica">Estatísticas do</span> <span id="ajuda-solidaria"> Ajuda <span>Solidária</span></span></h2>

        <div class="relatorio-box">
            <h3>Total de Itens Doados:</h3>
            <p><?php echo $totalItens; ?> itens</p>
        </div>

        <div class="relatorio-box">
            <h3>Total de Solicitações de Ajuda:</h3>
            <p><?php echo $totalSolicitacoes; ?> solicitações</p>
        </div>

        <div class="relatorio-box">
            <h3>Total de Eventos Cadastrados:</h3>
            <p><?php echo $totalEventos; ?> eventos</p>
        </div>

        <div class="relatorio-box">
            <h3>Impacto Estimado:</h3>
            <p>O sistema já promoveu mais de <?php echo $totalItens + $totalSolicitacoes + $totalEventos; ?> ações sociais em benefício da comunidade!</p>
        </div>

        <a href="../index.php" class="botao-centralizado">Voltar para o início</a>
    </div>
</body>
</html>
