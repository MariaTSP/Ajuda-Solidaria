<?php
    session_start();

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);        
        header('Location: ../login/formulario-login.php');
    }
    $logado = $_SESSION['email'];
    $id_usuario = $_SESSION['id'];

    if(isset($_POST['submit']))
    {
        include_once('../config.php');

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $estado = $_POST['estado'];
        $pasta = "../uploads/";

        $caminho_imagem = $pasta . "sem-foto.png"; // imagem padrão

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

    $query = "INSERT INTO itens (nome, descricao, quantidade, caminho_imagem, estado, id_usuario)
              VALUES ('$nome', '$descricao', '$quantidade', '$caminho_imagem', '$estado', '$id_usuario')";

    $result = mysqli_query($conexao, $query);

    if ($result) {
        echo "Item cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar item.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Item</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
    <form action="formulario-item.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend> Cadastro de Item para Doação</legend><br>
    <div class="inputBox">
        <input type="text" name="nome" id="nome" class="inputUser" required>
        <label for="nome" class="labelInput">Nome do Item</label>
    </div>
    <br><br>
    <div class="inputBox">
        <input type="text" name="descricao" id="descricao" class="inputUser" required>
        <label for="descricao" class="labelInput">Descrição do Item</label>
    </div>  
    <div class="box-container">
        <br>
        <label for="quantidade">Quantidade:</label>
        <select name="quantidade" id="quantidade" class="select-box">
            <option selected disabled value="sem-valor">Selecione</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="+10">+10</option>
        </select>
    </div>
    <br>
    <div class="inputFile">
        <input name="foto" id="foto" class="button" type="file"> Adicionar Foto
        <br>
    </div>
    <br>
    <div class="select-container">
        <select name="estado" id="estado" class="select-box">
            <option value="disponivel" selected>Disponível</option>
            <option value="reservado">Reservado</option>
            <option value="entregue">Entregue</option>
        </select>
    </div>
    <br><br>
    <input type="submit" name="submit" id="submit">
    <a href="../index.php">Voltar</a>
    </fieldset>
       


    </form>        
</div>

</body>
</html>