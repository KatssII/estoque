<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Tela de Login </title>
</head>
<body>
    <form class="login" action="logar.php" method="post">
        <h2>Login</h2>
        <div class="box-user">
            <input type="text" name="nome" required>
            <label>Usuário</label>
        </div>
        <div class="box-user">
            <input type="password" name="senha" required>
            <label>Senha</label>
        </div>
        <input type="submit" class="btn" value="Entrar">
        <a class="btn2" href="index_usu.php" type="submit">Novo cadastro</a>
        
 <!--<a href="#" class="btn" input type="submit">
            Entrar
        </a>-->
    </form>
</body>
</html>