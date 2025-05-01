<?php
session_start();

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/formulario-login.php');
}
$logado = $_SESSION['email'];
$id_usuario = $_SESSION['id'];

include_once('../config.php');

if (isset($_POST['update']))
{
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_evento = mysqli_real_escape_string($conexao, $_POST['data-evento']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $descricao_evento = mysqli_real_escape_string($conexao, $_POST['descricao-evento']);
    
    $sqlUpdate = "UPDATE eventos SET nome='$nome', data='$data_evento', endereco='$endereco', descricao='$descricao_evento' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);

    }
    header('Location: eventos.php');
?>
