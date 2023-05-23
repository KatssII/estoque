<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=".css" />
    <title>Estoque de Chaves</title>
</head>
<body style="background-color: #F0F2F0;">
    <div class="container">
        <h1 style="text-align:center;">Estoque de Chaves</h1>
        <br>
        <form action="edit_chave.php" method="post" id="formulario">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Sala:</label>
                        <input type="text" name="sala" id="sala" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ultima Pessoa Retirar:</label>
                        <input type="text" name="pessoaRetirada" id="pessoaRetirada" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Data da Ultima Retirada:</label>
                        <input type="date" name="dataRetirada" id="dataRetirada" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado da Chave:</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="emprestado">emprestado</option>
                            <option value="no estoque">no estoque</option>
                        </select>
                    </div>
                    <br></br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success" value="CADASTRAR CHAVE">
                        <a href="tabela_chave.php" type="button" class="btn btn btn-outline-info float-end">Tabela de Chaves</a>
                    </div>
                </div>
            </div>
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $("#formulario").submit(function(event){
            event.preventDefault();
            var dados =  $(this).serialize();
            $.ajax({
                type:'POST',
                url:'CRUD/cad_chave.php',
                data: dados,
                success: function(data){
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>
