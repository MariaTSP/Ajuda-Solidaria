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

        $sqlSelect = "SELECT * FROM itens WHERE id = $id";

        $result = $conexao-> query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($data = mysqli_fetch_assoc($result))
            {

                $nome = $data['nome'];
                $descricao = $data['descricao'];
                $quantidade = $data['quantidade'];
                $estado = $data['estado'];
                $pasta = "uploads/";
        
                $caminho_imagem = $pasta . "sem-foto.png"; // imagem padrão
            }
        }
        else
        {
            header('Location: itens-cadastrados.php');
        }


    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nome_foto = $_FILES['foto']['name'];
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
        $novoNomeFoto = uniqid() . "." . $extensao;
        $path = $pasta . $novoNomeFoto;

        if ($_FILES['foto']['size'] <= 2097152 && ($extensao == "jpg" || $extensao == "png")) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $path)) {
                $caminho_imagem = $path;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Item</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
    <form action="saveEdit-itens.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend> Cadastro de Item para Doação</legend><br>
    <div class="inputBox">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
        <label for="nome" class="labelInput">Nome do Item</label>
    </div>
    <br><br>
    <div class="inputBox">
        <input type="text" name="descricao" id="descricao" class="inputUser"  value="<?php echo $descricao ?>" required>
        <label for="descricao" class="labelInput">Descrição do Item</label>
    </div>  
    <div class="box-container">
        <br>
        <label for="quantidade">Quantidade:</label>
        <select name="quantidade" id="quantidade" class="select-box"  value="<?php echo $quantidade ?>">
            <option selected disabled value="sem-valor">Selecione</option>
            <option value="1" <?php echo $quantidade == '1' ? 'selected' : ''?>>1</option>
            <option value="2" <?php echo $quantidade == '2' ? 'selected' : ''?>>2</option>
            <option value="3" <?php echo $quantidade == '3' ? 'selected' : ''?>>3</option>
            <option value="4" <?php echo $quantidade == '4' ? 'selected' : ''?>>4</option>
            <option value="5" <?php echo $quantidade == '5' ? 'selected' : ''?>>5</option>
            <option value="6" <?php echo $quantidade == '6' ? 'selected' : ''?>>6</option>
            <option value="7" <?php echo $quantidade == '7' ? 'selected' : ''?>>7</option>
            <option value="8" <?php echo $quantidade == '8' ? 'selected' : ''?>>8</option>
            <option value="9" <?php echo $quantidade == '9' ? 'selected' : ''?>>9</option>
            <option value="+10" <?php echo $quantidade == '+10' ? 'selected' : ''?>>+10</option>
        </select>
    </div>
    <br>
    <div class="inputFile">
        <input name="foto" id="foto" class="button" type="file"> 
        <?php if($caminho_imagem != "uploads/sem-foto.png"): ?>
            <img src="<?php echo $caminho_imagem; ?>" alt="Imagem do Item" width="100">
        <?php endif; ?>Adicionar Foto
        <br>
    </div>
    <br>
    <div class="select-container">
        <select name="estado" id="estado" class="select-box"  >
            <option value="disponivel" <?php echo $estado == 'disponivel' ? 'selected' : ''?> selected>Disponível</option>
            <option value="reservado" <?php echo $estado == 'reservado' ? 'selected' : ''?> >Reservado</option>
            <option value="entregue" <?php echo $estado == 'entregue' ? 'selected' : ''?> >Entregue</option>
        </select>
    </div>
    <br><br>
    <input type="submit" name="update" id="update">
    <a href="itens-cadastrados.php">Voltar</a>
    </fieldset>
       


    </form>        
</div>

</body>
</html>