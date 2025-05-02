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

        $sqlSelect = "SELECT * FROM solicitacoes WHERE id = $id";

        $result = $conexao-> query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($data = mysqli_fetch_assoc($result))
            {

                $descricao = $data['descricao'];
                $estado = $data['estado'];
            }
        }
        else
        {
            header('Location: solicitacoes.php');
        }

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
    <form action="saveEdit-solicitacoes.php" method="POST">
        <fieldset>
        <legend>Solicitação de Ajuda</legend>
    <div class="inputBox">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <label for="texto">Digite sua necessidade:</label>
        <br>
        <textarea class="inputUser" name="descricao" rows="10" placeholder="digite sua necessidade" wrap="soft"><?php echo $descricao ?></textarea>
        <br><br>
        <div class="select-container">
        <select name="estado" id="estado" class="select-box">
            <option value="pendente" <?php echo $estado == 'pendente' ? 'selected' : '' ?>selected>Solicitação Pendente</option>
            <option value="atendida" <?php echo $estado == 'atendida' ? 'selected' : '' ?>>Solicitação Atendida</option>
        </select>
    </div>
        <br>
        <input type="submit" name="update" id="update">
    </div>
    <a href="solicitacoes.php">Voltar</a>

    </fieldset> 
    </form>
    </div>

</body>
</html>