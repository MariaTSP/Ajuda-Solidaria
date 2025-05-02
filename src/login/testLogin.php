<?php
    session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('../config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $usuario['tipo'];

        //print_r('Email: ' . $email);
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);
        //print_r($result);
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo "<script>
            alert('Usuário não encontrado');
            window.location.href = 'formulario-login.php';
            </script>";
        }
        else
        {
            $usuario = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['tipo'] = $usuario['tipo'];  // Agora a sessão irá ter o tipo do usuário (beneficiário, organização, doador)
    
            header('Location: ../index.php');  // Redireciona para a página inicial após o login
        }
    }
    else{
        header('Location: formulario-login.php');
    }
?>