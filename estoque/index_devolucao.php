<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=".css" />
    <title>Devolução de Itens</title>
</head>
<body style="background-color: #F0F2F0;">
    <div class="container">
        <h1 style="text-align:center;">Devolução de Itens</h1>
        <br>
        <form action="" method="post" id="formulario">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Data da Devolução:</label>
                        <input type="date" name="dataDevolucao" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Item da devolução:</label>
                        <input type="text" name="itemDevolucao" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="unidadeDevolucao">Unidade:</label>
                        <select name="unidadeDevolucao" class="form-control">
                            <option value="caixa">Caixa</option>
                            <option value="pacote">Pacote</option>
                            <option value="avulso">Avulso</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Quantidade:</label>
                        <input type="number" name="qntdDevolucao" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categoriaDevolucao">Categoria:</label>
                        <select name="categoriaDevolucao" class="form-control">
                            <option value="ferramenta">Ferramentas</option>
                            <option value="limpeza">Limpeza</option>
                            <option value="pedagogica">Pedagógico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo da Devolução:</label>
                        <input type="text" name="motivoDevolucao" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success" value="CADASTRAR DEVOLUÇÃO">
                        <a href="tabela_devolucao.php" type="button" class="btn btn-outline-info float-end">Tabela de Devoluções</a>
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
                type: 'POST',
                url: 'CRUD/cad_devolucao.php',
                data: dados,
                success: function(data){
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>
