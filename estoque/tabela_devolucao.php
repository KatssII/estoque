<?php
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id_devolucao, dataDevolucao, itemDevolucao, unidadeDevolucao, qntdDevolucao,  categoriaDevolucao, motivoDevolucao
    FROM devolucao;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela vazia!!!');
        </script>";
    }
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $tabela = $pdo->prepare("SELECT id_devolucao, dataDevolucao, itemDevolucao, unidadeDevolucao, qntdDevolucao, categoriaDevolucao, motivoDevolucao
        FROM devolucao WHERE id_devolucao = '$search' OR itemDevolucao LIKE '%$search%' OR categoriaDevolucao LIKE '%$search%';");
        $tabela->execute();
        $rowTabela = $tabela->fetchAll();
    }
    else{
        $tabela = $pdo->prepare("SELECT id_devolucao, dataDevolucao, itemDevolucao, unidadeDevolucao, qntdDevolucao, categoriaDevolucao, motivoDevolucao
        FROM devolucao;");
        $tabela->execute();
        $rowTabela = $tabela->fetchAll();
    }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stysheet" >
        <title>Tabela de Devolução</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
        body{
            background: linear-gradient(to right, rgb(fff), rgb(17, 54, 71));
            color: black;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
    </head>
    <body>
    <!--Barra de navegação-->
    <nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
            <a class="navbar-brand" href="tabela_devolucao.php">Estoque de Devolução</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-devolucao active">
                        <a class="nav-link" href="menu.php">Menu Principal <span class="sr-only"></span></a>
                    </li>
                </ul>
                </div>
                <div class="d-flex">
                    <a href="logout.php" class="btn btn-danger me-S">Sair</a>
                </div>
            </div>
        </nav>
        <h2 style="text-align:center;">Devolução de Itens</h2>
        <br>
        <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-outline-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>

        <div class="container">
            <br>  
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">DATA DA DEVOLUÇÃO</th>
            <th scope="col">MATERIAL DA DEVOLUÇÃO</th>
            <th scope="col">UNIDADE</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">MOTIVO DA DEVOLUÇÃO</th>
            <th scope="col">EDITAR</th>
            <th scope="col">EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_devolucao']."</th>";
                echo "<td>".$linha['dataDevolucao']."</td>";
                echo "<td>".$linha['itemDevolucao']."</td>";
                echo "<td>".$linha['unidadeDevolucao']."</td>";
                echo "<td>".$linha['qntdDevolucao']."</td>";
                echo "<td>".$linha['motivoDevolucao']."</td>";
                echo '<td><a href=edit_tabelaDevolucao.php?devolucao='.$linha['id_devolucao'].' class="btn btn-outline-warning">✎</a></td>';
                echo '<td><a href=CRUD\delete_devolucao.php?id_devolucao='.$linha['id_devolucao'].' class="btn btn-outline-danger">🗑</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        <div class="container text-center">
            <a href="index_devolucao.php" class="btn btn-outline-info">CADASTRAR NOVA DEVOLUÇÃO</a>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'tabela_devolucao.php?search='+search.value;
    }
</script>
</html>