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
    
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $estado = $_POST['estado'];
    
    $sqlUpdate = "UPDATE solicitacoes SET descricao='$descricao', estado='$estado' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);

    }
    header('Location: solicitacoes.php');
?>
