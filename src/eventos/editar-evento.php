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

    if(!empty($_GET['id']))
    {
        include_once('../config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM eventos WHERE id = $id";

        $result = $conexao-> query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($data = mysqli_fetch_assoc($result))
            {
                $nome = $data['nome'];
                $data_evento = $data['data'];
                $endereco = $data['endereco'];
                $descricao = $data['descricao'];
            }
            $data_evento_formatada = date('Y-m-d\TH:i', strtotime($data_evento));
        }
        else
        {
            header('Location: eventos.php');
        }
}
else
{
    header('Location: eventos.php');
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
        <form action="saveEdit-eventos.php" method="POST">
        <fieldset>
            <legend>Cadastro de Eventos</legend> <br>
        <div class="inputBox">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
            <label for="nome" class="labelInput">Nome do Evento</label>
        </div>
        <br><br>

        <label for="data-evento">Data e Horário do Evento:</label><br>
        <input type="datetime-local" name="data-evento" id="data-evento" value="<?php echo $data_evento_formatada ?>" required>
        <br>
        <br><br>
        <div class="inputBox">
            <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
            <label for="endereco" class="labelInput">Local do Evento:</label>
        </div>
        <br>
        <div class="inputBox">
            <label for="descricao-evento">Descrição do Evento</label>
            <textarea class="inputUser" name="descricao-evento" rows="10" placeholder="Descreva o evento" wrap="soft"><?php echo $descricao ?></textarea>
        </div>
        <br>
        <input type="submit" name="update" id="update">
        <a href="eventos.php">Voltar</a>

        </fieldset>
        </form>
        </div>    
</body>
</html>