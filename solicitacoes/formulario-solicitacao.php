<?php
    session_start();
    //print_r($_SESSION);

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
        print_r('Texto: ' . $_POST['texto']);
        print_r('<br>');
        print_r('Estado: ' . $_POST['estado']);

        $texto = $_POST['texto'];
        $estado = $_POST['estado'];

        include_once('../config.php');

        $texto = $_POST['texto'];
        $estado = $_POST['estado'];

        $result = mysqli_query($conexao, "INSERT INTO solicitacoes(descricao, estado, id_usuario, data_hora)
        VALUES ('$texto', '$estado', '$id_usuario',NOW())");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Ajuda</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
    <form action="formulario-solicitacao.php" method="POST">
        <fieldset>
        <legend>Solicitação de Ajuda</legend>
    <div class="inputBox">
        <label for="texto">Digite sua necessidade:</label>
        <br>
        <textarea class="inputUser" name="texto" rows="10" placeholder="digite sua necessidade" wrap="soft"></textarea>
        <br><br>
        <div class="select-container">
        <select name="estado" id="estado" class="select-box">
            <option value="pendente" selected>Solicitação Pendente</option>
            <option value="atendida">Solicitação Atendida</option>
        </select>
    </div>
        <br>
        <input type="submit" name="submit" id="submit">
    </div>
    <a href="../index.php">Voltar</a>

    </fieldset> 
    </form>
    </div>

</body>
</html>