<?php
    if(isset($_POST['submit']))
    {
        //print_r('Nome: ' . $_POST['nome']);
        //print_r('<br>');
        //print_r('telefone: ' . $_POST['telefone']); 
        //print_r('<br>');
        //print_r('email: ' . $_POST['email']);
        //print_r('<br>');
        //print_r('endereço: ' . $_POST['endereco']);
        //print_r('<br>');
        //print_r('senha: ' . $_POST['senha']);
        //print_r('<br>');
        //print_r('Tipo de Usuário: ' . $_POST['tipo']);

        include_once('../config.php');

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $criptografada = password_hash($senha, PASSWORD_DEFAULT);

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,telefone,email,endereco,senha,tipo)
        VALUES ('$nome', '$telefone', '$email', '$endereco', '$criptografada', '$tipo')");

        header('Location: ../login/formulario-login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
    <form action="formulario-usuario.php" method="POST">
    <fieldset>
        <legend>Cadastro de Usuários</legend> <br>
    <div class="inputBox">
        <input type="text" name="nome" id="nome" class="inputUser" required>
        <label for="nome" class="labelInput">Nome Completo</label>
    </div>
    <br>
    <div class="inputBox">
        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
        <label for="telefone" class="labelInput">Telefone</label>
    </div>
    <br>
    <div class="inputBox">
        <input type="email" name="email" id="email" class="inputUser" required>
        <label for="email" class="labelInput">Email</label>
    </div>
    <br>
    <div class="inputBox">
        <input type="text" name="endereco" id="endereco" class="inputUser" required>
        <label for="endereco" class="labelInput">Endereço</label>
    </div>
    <br>
    <div class="inputBox">
        <input type="password" name="senha" id="senha" class="inputUser" required>
        <label for="senha" class="labelInput">Senha</label>
    </div>
    <br>
    <div class="select-container">
        <select name="tipo" id="tipo" class="select-box">
            <option value="sem-valor" selected disabled>Tipo de Usuário</option>
            <option value="beneficiario">Beneficiário</option>
            <option value="organizacao">Organização Social</option>
            <option value="doador">Doador</option>
        </select>
    </div>
    <br>
    <br>
    <input type="submit" name="submit" id="submit">
    <br>
    <a href="../tela-principal.php">Voltar</a>
    </fieldset>
    </form>
    </div>
</body>
</html>