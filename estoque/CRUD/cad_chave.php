<?php
    require('../conn.php');

    $sala = $_POST['sala'];
    $pessoaRetirada = isset($_POST['pessoaRetirada']) ? $_POST['pessoaRetirada'] : null;
    $dataRetirada = $_POST['dataRetirada'];
    $estado = $_POST['estado'];
   
    if(empty($sala) || empty($pessoaRetirada) || empty($dataRetirada) || empty($estado)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_chave = $pdo->prepare("INSERT INTO chave(sala, pessoaRetirada, dataRetirada, estado) 
        VALUES(:sala, :pessoaRetirada, :dataRetirada, :estado)");
        $cad_chave->execute(array(
            ':sala'=> $sala,
            ':pessoaRetirada'=> $pessoaRetirada,
            ':dataRetirada'=> $dataRetirada,
             ':estado'=> $estado 
        ));

        echo "<script>
        alert('Chave nova Cadastrada com sucesso!');
        </script>";
    }
?>


