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