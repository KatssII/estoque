<?php
    require("conn.php");
    require("protected.php");
    $tabela = $pdo->prepare("SELECT id_emprPR, mutuario_empr, quantidade_empr, data_empr, produto_empr 
    FROM empr_pr;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (isset($_SESSION['id'])) {
        $usuarioLogadoId = $_SESSION['id'];
    }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Histórico de retirada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;">Histórico de retirada</h1>
        <br>  
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><b>PEDINTE</b></th>
                    <th scope="col"><b>PRODUTO RETIRADO</b></th>
                    <th scope="col"><b>QUANTIDADE RETIRADA</b></th>
                    <th scope="col"><b>DATA DA RETIRADA</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($rowTabela as $linha){
                        echo '<tr>';
                        echo "<td>".$linha['mutuario_empr']."</td>";
                        echo "<td>".$linha['produto_empr']."</td>";
                        echo "<td>".$linha['quantidade_empr']."</td>";
                        echo "<td>".$linha['data_empr']."</td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>