<?php
    session_start();
    //print_r($_SESSION);

    if(
    !isset($_SESSION['email']) ||
    !isset($_SESSION['senha']) ||
    $_SESSION['tipo'] !== 'organizacao')
    {     
        header('Location: ../index.php?error=true');
        
    }
    $logado = $_SESSION['email'];
    $id_usuario = $_SESSION['id'];

    if(isset($_POST['submit']))
    {
    //    print_r('Nome do Evento: ' . $_POST['nome']);
    //    print_r('<br>');
    //    print_r('Data: ' . $_POST['data-evento']);
    //    print_r('<br>');
    //    print_r('Endereço: ' . $_POST['endereco']);
    //    print_r('<br>');
    //    print_r('Descrição: ' . $_POST['descricao-evento']);

        include_once('../config.php');

        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $data_evento = mysqli_real_escape_string($conexao, $_POST['data-evento']);
        $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
        $descricao_evento = mysqli_real_escape_string($conexao, $_POST['descricao-evento']);
        

        $result = mysqli_query($conexao, "INSERT INTO eventos(nome, data, endereco, descricao, id_organizacao)
        VALUES ('$nome', '$data_evento', '$endereco', '$descricao_evento', '$id_usuario')");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
        <form action="formulario-evento.php" method="POST">
        <fieldset>
            <legend>Cadastro de Eventos</legend> <br>
        <div class="inputBox">
            <input type="hidden" name="id" value="<?php echo $id?>">

            <input type="text" name="nome" id="nome" class="inputUser" required>
            <label for="nome" class="labelInput">Nome do Evento</label>
        </div>
        <br><br>

        <label for="data-evento">Data e Horário do Evento:</label><br>
        <input type="datetime-local" name="data-evento" id="data-evento" required>
        <br>
        <br><br>
        <div class="inputBox">
            <input type="text" name="endereco" id="endereco" class="inputUser" required>
            <label for="endereco" class="labelInput">Local do Evento:</label>
        </div>
        <br>
        <div class="inputBox">
            <label for="descricao-evento">Descrição do Evento</label>
            <textarea class="inputUser" name="descricao-evento" rows="10" placeholder="Descreva o evento" wrap="soft"></textarea>
        </div>
        <br>
        <input type="submit" name="submit" id="submit">
        <a href="../index.php">Voltar</a>

        </fieldset>
        </form>
        </div>    
</body>
</html>