
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
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


        .item img {
            width: 100%;
            height: 100%;
            height: auto;
            object-fit: cover;
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

$result = mysqli_query($conexao, "SELECT * FROM eventos");
?>

<div class="itens-container">
<?php

while ($data = $result->fetch_assoc()) {
    echo "<div class='item'>";
    echo "<p><strong>{$data['nome']}</strong></p>";
    echo "<p><strong>Data e horário: </strong> {$data['data']}</p>";
    echo "<p><strong>Local:</strong> {$data['endereco']}</p>";
    echo "<p><strong>Sobre o evento: </strong>{$data['descricao']}</p>";
    if($data['id_organizacao'] == $_SESSION['id']){
    echo "<div class='botoes-container'>";
    echo "<a href='editar-evento.php?id={$data['id']}' class='btn-edit'>Editar</a>";
    echo "<a href='delete-eventos.php?id={$data['id']}' onclick='return confirmarExclusao()' class='btn-excluir'>Excluir Evento</a>";
    echo "</div>";
}
echo "</div>";

}
?>
</div>
<script>
function confirmarExclusao() {
    return confirm("Tem certeza que deseja excluir este evento?");
}
</script>
</body>
</html>