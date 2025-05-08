
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Cadastrados</title>
    <link rel="stylesheet" href="../css/formularios.css">
    <style>
        .itens-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
            padding: 40px;
            margin: 0 auto;
        }

        .item {
            width: 280px;
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: -5px 8px 10px  gray;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            white-space: pre-wrap;
        }

        .item img {
            width: 279.987px;
            height: 279.987px;
            object-fit: contain;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <button><a href="../index.php" class="btn-voltar">Voltar</a></button>
<?php
session_start();

if ((!isset($_SESSION['email']))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login/formulario-login.php');
}

$logado = $_SESSION['email'];
$id_usuario = $_SESSION['id'];
include_once('../config.php');

$result = mysqli_query($conexao, "SELECT itens.*, usuarios.nome AS nome_doador FROM itens INNER JOIN usuarios ON itens.id_usuario = usuarios.id");
?>

<div class="itens-container">
<?php

while ($data = $result->fetch_assoc()) {
    $caminhoImagem = '../uploads/imagem-padrao.jpg';
    if (!empty($data['caminho_imagem']) && file_exists($data['caminho_imagem'])) {
        $caminhoImagem = $data['caminho_imagem'];
    }
    echo "<div class='item'>";
    echo "<img src='{$caminhoImagem}' alt='Imagem do item'>";
    echo "<h3>{$data['nome']}</h3>";
    echo "<p>{$data['descricao']}</p>";
    echo "<p>Quantidade: {$data['quantidade']}</p>";
    echo "<p>Doado por: {$data['nome_doador']}</p>";
    echo "<a href='../usuarios/contato-doador.php?id={$data['id']}' class='info-cont'>Informações de Contato</a> ";
    if($data['id_usuario'] == $_SESSION['id']){
        echo "<div class='botoes-container'>";
        echo "<a href='editar-item.php?id={$data['id']}' class='btn-edit'>Editar</a>";
        echo "<a href='delete-itens.php?id={$data['id']}' onclick='return confirmarExclusao()' class='btn-excluir'>Excluir Item</a>";
        echo "</div>";
    }
    echo "</div>";

}
?>
</div>
<script>
function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir este item?");
}
</script>
</body>
</html>