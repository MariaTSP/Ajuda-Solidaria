
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitações de Ajuda</title>
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 320px;
            width: 280px;
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: -5px 8px 10px gray;

            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            white-space: pre-wrap;
        }
        
    </style>
</head>
<body>
    <button><a href="../index.php">Voltar</a></button>
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

$result = mysqli_query($conexao, "
    SELECT solicitacoes.*, usuarios.nome AS nome_usuario 
    FROM solicitacoes 
    JOIN usuarios ON solicitacoes.id_usuario = usuarios.id
");

?>

<div class="itens-container">
<?php

while ($data = $result->fetch_assoc()) {
    echo "<div class='item'>";
    echo "<p><strong>Postado por: </strong>{$data['nome_usuario']}</p>";
    echo "<p>{$data['descricao']}</p>";
    echo "<p><strong>{$data['estado']}</strong></p>";
    echo "<a href='../usuarios/contato-solicitante.php?id={$data['id']}' class='info-cont'>Informações de Contato</a> ";
    if($data['id_usuario'] == $_SESSION['id']){
        echo "<div class='botoes-container'>";
        echo "<a href='editar-solicitacao.php?id={$data['id']}' class='btn-edit'>Editar</a>";
        echo "<a href='delete-solicitacoes.php?id={$data['id']}' onclick='return confirmarExclusao()' class='btn-excluir'>Excluir Solicitação</a>";
        echo "</div>";
    }
    echo "</div>";
}
?>
</div>
<script>
function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir esta solicitação?");
}
</script>
</body>
</html>