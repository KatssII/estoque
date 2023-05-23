<?php
require("conn.php");

if (isset($_GET['item'])) {
    $item_id = $_GET['item']; // ID do item a ser devolvido

    // Verificar se o item existe no banco de dados
    $item_query = "SELECT * FROM item WHERE id_item = :item_id";
    $item_stmt = $pdo->prepare($item_query);
    $item_stmt->bindParam(':item_id', $item_id);
    $item_stmt->execute();

    if ($item_stmt->rowCount() == 0) {
        echo "<script>alert('Item não encontrado.');</script>";
        exit;
    }

    $item = $item_stmt->fetch();
}

if (isset($_POST['devolver'])) {
    $quantidade = $_POST['quantidade'];

    // Verificar se a quantidade é válida (maior que zero)
    if ($quantidade <= 0) {
        echo "<script>alert('Quantidade inválida.');</script>";
    } else {
        $quantidade_atual = isset($item['quantidade_retirada']) ? $item['quantidade_retirada'] : 0;

        // Verificar se a quantidade a ser devolvida é maior do que a quantidade atual
        if ($quantidade > $quantidade_atual) {
            echo "<script>alert('A quantidade a ser devolvida é maior do que a quantidade retirada.');</script>";
        } else {
            // Remover a quantidade da tabela itens_retirados
            $nova_quantidade_retirada = $quantidade_atual - $quantidade;

            $update_query = "UPDATE itens_retirados SET quantidade_retirada = :nova_quantidade_retirada WHERE id_retirada = :item_id";
            $update_stmt = $pdo->prepare($update_query);
            $update_stmt->bindParam(':nova_quantidade_retirada', $nova_quantidade_retirada);
            $update_stmt->bindParam(':item_id', $item_id);

            if ($update_stmt->execute()) {
                // Adicionar a quantidade de volta à tabela item
                $update_query = "UPDATE item SET quantidade = quantidade + :quantidade WHERE id_item = :item_id";
                $update_stmt = $pdo->prepare($update_query);
                $update_stmt->bindParam(':quantidade', $quantidade);
                $update_stmt->bindParam(':item_id', $item_id);

                if ($update_stmt->execute()) {
                    echo "<script>
                    alert('Item devolvido com sucesso!');
                    window.location.href = 'tabela_entrada.php'; // Redireciona para a página inicial após a devolução
                    </script>";
                    exit;
                } else {
                    echo "<script>alert('Erro ao atualizar a quantidade na tabela item.');</script>";
                }
            } else {
                echo "<script>alert('Erro ao atualizar a quantidade na tabela itens_retirados.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=".css" />
    <title>Devolver Item</title>
    <style>
        body {
            background-color: #F0F2F0;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="text-align: center;">Devolver Item</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" class="form-control" id="material" name="material" value="<?php echo isset($item['material']) ? $item['material'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quantidade_retirada">Quantidade Retirada:</label>
                <input type="text" class="form-control" id="quantidade_retirada" name="quantidade_retirada" value="<?php echo isset($item['quantidade_retirada']) ? $item['quantidade_retirada'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade a Devolver:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" max="<?php echo isset($item['quantidade_retirada']) ? $item['quantidade_retirada'] : 1000; ?>" required>
            </div>
            <br>
            <div class="form-group" style="text-align">
                <button type="submit" name="devolver" class="btn btn-outline-dark" >Devolver</button>
                <a href="tabela_entrada.php" type="button" class="btn btn-outline-info float-end">Estoque Geral</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
