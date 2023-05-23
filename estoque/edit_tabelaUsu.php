<?php
    require ("conn.php");

    if (isset($_GET['usuario'])){
        $usuario = $_GET['usuario'];
    }
    else{
        #header("Location: menu.php");
    }
    
    $tabela = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario=:usuario;");
    $tabela->execute(array(':usuario'=>$usuario));
    $rowTable = $tabela->fetchAll();
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=".css" />
    <title>Estoque de devoluções</title>
</head>
<body style="background-color: #F0F2F0;>
    <div class="container">
        <h1 style="text-align:center;">Edição de Usuários</h1>
        <br>
        <form action="CRUD/update_usu.php" method="post" id="formulario">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nome: </label>
                        <input type="text" name="nome" id="" class="form-control" value=<?php echo $rowTable[0]['nome']?>>
                    </div>
                    <div class="form-group">
                        <label for="">Email: </label>
                        <input type="email" name="email" id="" class="form-control" value=<?php echo $rowTable[0]['email']?>>
                    </div>
                    <div class="form-group">
                        <label for="">Cpf:</label>
                        <input type="number" name="cpf" id="" class="form-control" value=<?php echo $rowTable[0]['cpf']?>>
                    </div>
                    <div class="form-group">
                        <label for="">Senha:</label>
                        <input type="password" name="senha" id="" class="form-control" value=<?php echo $rowTable[0]['senha']?>>
                    </div>
                    <br></br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success" value="SALVAR ALTERAÇÕES">
                        <a href="tabela_usu.php" type="button" class="btn btn-outline-info float-end">Tabela Usuarios</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name='id_usuario' value=<?php echo $rowTable[0]['id_usuario']?>>
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
