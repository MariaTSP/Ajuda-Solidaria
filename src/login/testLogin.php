<?php
    session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('../config.php');
        $email = $_POST['email'];
        $senha_digitada = $_POST['senha']; // Renomeei para deixar claro

        //print_r('Email: ' . $email);
        //print_r('Senha: ' . $senha_digitada);

        // Busca o usuário no banco de dados pelo email
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) == 1)
        {
            $usuario = mysqli_fetch_assoc($result);

            // Verifica se a senha digitada corresponde ao hash armazenado
            if(password_verify($senha_digitada, $usuario['senha']))
            {
                // Senha correta, inicia a sessão
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $email;
                $_SESSION['tipo'] = $usuario['tipo'];

                header('Location: ../index.php');  
            }
            else
            {
               
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                echo "<script>
                alert('Senha incorreta!');
                window.location.href = 'formulario-login.php';
                </script>";
            }
        }
        else
        {
            
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo "<script>
            alert('Usuário não encontrado!');
            window.location.href = 'formulario-login.php';
            </script>";
        }
    }
    else{
        header('Location: formulario-login.php');
    }
?>