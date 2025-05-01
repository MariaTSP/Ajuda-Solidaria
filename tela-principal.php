<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <style>
        body {
            font-family: 'Arial';
            text-align: center;
            background-image: radial-gradient(circle at center, #EEE8AA, #FFE4B5 );
            color: rgba(4, 52, 16, 0.817);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        fieldset {
            border: 3px solid green;
            border-radius: 15px;
            padding: 30px;
            background-color: rgba(4, 52, 16, 0.1);
            
        }
        h1{
            margin-bottom: 5px;
        }
        .box {
            margin-top: 200px;
            background-color: rgba(4, 52, 16, 0.44);
            padding: 20px;
            border-radius: 15px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: white;
            border: 3px solid green;
            border-radius: 10px;
            padding: 10px 20px;
            box-shadow: -5px 5px 5px black;
            margin: 15px;
            transition: all 0.2s;
        }
        a:hover {
            background-color: green;
            transform: translateY(-5px);
        }
        .subtitle-underline{
            width: 200px;
            height: 5px;
            background-color: #008080;
            border-radius: 9999px;
            margin: 8px auto 0 auto;
        }
    </style>
</head>
<body>
    <fieldset>
        <h1>Seja Bem Vindo!</h1>
        <div class="subtitle-underline"></div>
        <div class="box">
            <a href="login/formulario-login.php">Fazer Login</a>
            <a href="usuarios/formulario-usuario.php">Cadastre-se</a>
        </div>        
    </fieldset>
</body>
</html>
