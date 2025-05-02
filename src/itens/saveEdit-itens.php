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
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $estado = $_POST['estado'];
    $pasta = "uploads/";

    // Atribuir imagem padrão caso não haja nova imagem
    $caminho_imagem = "uploads/sem-foto.png"; 

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nome_foto = $_FILES['foto']['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $novoNomeFoto = uniqid() . "." . $extensao;
        $path = $pasta . $novoNomeFoto;

        if ($_FILES['foto']['size'] <= 2097152 && ($extensao == "jpg" || $extensao == "png")) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
                $caminho_imagem = $path;
            }
        }
    }
    
    $sqlUpdate = "UPDATE itens SET nome='$nome', descricao='$descricao', quantidade='$quantidade', estado='$estado', caminho_imagem='$caminho_imagem' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);

    }
    header('Location: itens-cadastrados.php');
?>
