
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro novo usuário</title>
    <link rel="stylesheet" type="text/css" href="css/index_usu.css" />
    <style>
    </style>
</head>
<body>
    <div class="box">
        <form action="CRUD/cad_usu.php" method="POST" id="formulario">
            <input type="hidden" name="acao" value="cadastrar"><!--manda o campo oculto  -->
            <fieldset>
                <legend><b>Cadastro de usuários</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome </label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="" class="inputUser" required>
                    <label for="" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="cpf" id="" class="inputUser" required>
                    <label for="" class="labelInput">Cpf</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="" class="inputUser" required>
                    <label for="" class="labelInput">Senha</label>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="CADASTRAR USUARIO">
                        <a class="btn2" href="login.php" type="submit">Já é cadastrado?</a>
                    </div>
                </div>
                <br><br>
                <!--<input type="submit" name="submit" id="submit"> -->
            </fieldset>
            <script>
            $("#formulario").submit(function(){
                event.preventDefault();
                var dados =  $(this).serialize();
                $.ajax({
                    type:'POST',
                    url:'(CRUD/cad_usu.php)',
                    data: dados,
                    success: function(data){
                        $("#resultado").html(data);
                    }
                });
            });
        </script>
        </form>
    </div>
</body>
</html>