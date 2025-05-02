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

        $sqlBeneficiario = "SELECT usuarios.nome, usuarios.telefone, usuarios.email FROM solicitacoes INNER JOIN usuarios ON solicitacoes.id_usuario = usuarios.id WHERE solicitacoes.id = $id";

        $resultBeneficiario = $conexao-> query($sqlBeneficiario);
        if($resultBeneficiario->num_rows > 0){
            $beneficiario = mysqli_fetch_assoc($resultBeneficiario);
            $nome_beneficiario = $beneficiario['nome'];
            $email_beneficiario = $beneficiario['email'];
            $telefone_beneficiario = $beneficiario['telefone'];
    }   else {
            $nome_beneficiario = "Desconhecido";
            $email_beneficiario = "Não disponível";
            $telefone_beneficiario = "Não disponível";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos do Solicitante</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
            <fieldset>
                <legend>Contados do Solicitante</legend>
                <p>Nome: <?php echo $nome_beneficiario ?></p>
                <p>E-mail: <?php echo $email_beneficiario?></p>
                <p>Telefone para contato: <?php echo $telefone_beneficiario?></p>
            </fieldset>
    </div>

</body>
</html>