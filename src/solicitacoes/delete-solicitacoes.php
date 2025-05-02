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
                $sqlDelete = "DELETE FROM solicitacoes WHERE id=$id";
                $resultDelete = $conexao-> query($sqlDelete);
            }
        }
        else
        {
            header('Location: solicitacoes.php');
        }
    
    }
    header('Location: solicitacoes.php');
?>