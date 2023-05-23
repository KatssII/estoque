<?php
require("conn.php");

if (isset($_GET['item'])) {
    $item = $_GET['item'];
} else {
    header("Location: tabela_entrada.php");
    exit();
}

$tabela = $pdo->prepare("SELECT * FROM item WHERE id_item=:item;");
$tabela->execute(array(':item' => $item));
$rowTable = $tabela->fetchAll();

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Cadastro de item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color: #F0F2F0;">
    <div class="container">
        <h1 style="text-align:center;">Edição de Itens</h1>
        <br>
        <form action="CRUD/update_item.php" method="post" id="formulario" action="editar">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Material:</label>
                        <input type="text" name="material" id="" class="form-control" value="<?php echo $rowTable[0]['material']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="unidade">Unidade:</label>
                        <select name="unidade" id="" class="form-control">
                            <option value="caixa" <?php if ($rowTable[0]['unidade'] === 'caixa') echo 'selected'; ?>>Caixa</option>
                            <option value="pacote" <?php if ($rowTable[0]['unidade'] === 'pacote') echo 'selected'; ?>>Pacote</option>
                            <option value="avulso" <?php if ($rowTable[0]['unidade'] === 'avulso') echo 'selected'; ?>>Avulso</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Quantidade:</label>
                        <input type="number" name="quantidade" id="" class="form-control" value="<?php echo $rowTable[0]['quantidade']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Fornecedor:</label>
                        <input type="text" name="fornecedor" id="" class="form-control" value="<?php echo $rowTable[0]['fornecedor']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="" class="form-control">
                    <option value="emprestimo" <?php if ($rowTable[0]['tipo'] === 'emprestimo') echo 'selected'; ?>>Emprestimo</option>
                    <option value="nao Emprestimo" <?php if ($rowTable[0]['tipo'] === 'nao Emprestimo') echo 'selected'; ?>>Não emprestimo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="" class="form-control">
                    <option value="ferramenta" <?php if ($rowTable[0]['categoria'] === 'ferramenta') echo 'selected'; ?>>Ferramentas</option>
                    <option value="limpeza" <?php if ($rowTable[0]['categoria'] === 'limpeza') echo 'selected'; ?>>Limpeza</option>
                    <option value="pedagogica" <?php if ($rowTable[0]['categoria'] === 'pedagogica') echo 'selected'; ?>>Pedagógico</option>
                </select>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success" value="SALVAR ALTERAÇÕES">
                        <a href="tabela_entrada.php" type="button" class="btn btn-outline-info float-end">Esoque Geral</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_item" value="<?php echo $rowTable[0]['id_item']; ?>">
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
