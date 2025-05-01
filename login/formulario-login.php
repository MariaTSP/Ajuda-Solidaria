<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
    <div class="box">
        <form action="testLogin.php" method="POST">
            <fieldset>
                <legend><b>Login</b></legend>
                <div class="inputBox">
                    <input type="email" name="email" class="inputUser" required>
                    <label for="email" class="labelInput">Digite seu email:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Digite sua senha:</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
                <br>
                <a href="../tela-principal.php">Voltar</a>
            </fieldset>
        </form>
    </div>
</body>
</html>