
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/menu.css" />

    <title>Menu</title>
    <body>
      
    <!--Barra de navegação-->
    <nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
            <a class="navbar-brand" href="tabela_entrada.php" >Menu Principal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="menu.php">Menu Principal <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-danger me-S">Sair</a>
            </div>
        </nav>
<br><br>

        <div class="d-flex justify-content-center align-items-center" style="height: 75vh;">
            <div>
                <form method="post" action="index_item.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px;" value="Estoque Geral">
                </form>
                <br>
                <form method="post" action="index_chave.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px;" value="Estoque de Chaves">
                </form>
                <br>
                <form method="post" action="index_devolucao.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px;" value="Devolução de Estoque">
                </form>
                <br>
                <form method="post" action="tabela_usu.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px;" value="Usuários Cadastrados">
                </form>
                <br>
<!--                <button class="button"><span>Botão</span></button>
                <form method="post" action="historico.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px;" value="Histórico de Itens">
                </form> -->
            </div>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
session_start();

if (isset($_SESSION['nome'])) {
    if (!isset($_SESSION['popup_exibido'])) {
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Bem-vindo!',
                    text: 'Seja bem-vindo, {$_SESSION['nome']}! :)',
                    icon: 'success',
                    confirmButtonText: 'Fechar'
                });
            });
        </script>
        ";

        $_SESSION['popup_exibido'] = true;
    }
}
?>
    <!-- script do Bootstrap -->
   <script src="js/bootstrap.bundle.min.js"></script>
  </body>
  </head>
</html>