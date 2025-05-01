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

        $sqlDoador = "SELECT usuarios.nome, usuarios.telefone, usuarios.email FROM itens INNER JOIN usuarios ON itens.id_usuario = usuarios.id WHERE itens.id = $id";

        $resultDoador = $conexao-> query($sqlDoador);
        if($resultDoador->num_rows > 0){
            $doador = mysqli_fetch_assoc($resultDoador);
            $nome_doador = $doador['nome'];
            $email_doador = $doador['email'];
            $telefone_doador = $doador['telefone'];
    }   else {
            $nome_doador = "Desconhecido";
            $email_doador = "Não disponível";
            $telefone_doador = "Não disponível";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos do doador</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
            <fieldset>
                <legend>Contados do Doador</legend>
                <p>Nome: <?php echo $nome_doador ?></p>
                <p>E-mail: <?php echo $email_doador?></p>
                <p>Telefone para contato: <?php echo $telefone_doador?></p>
            </fieldset>
    </div>

</body>
</html>