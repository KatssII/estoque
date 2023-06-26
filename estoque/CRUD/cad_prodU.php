<?php
    require('../conn.php');

    $dataEntrada = $_POST['dataEntrada'];
    $material = $_POST['material'];
    $unidade = $_POST['unidade'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];
   
    if(empty($dataEntrada) || empty($material) || empty($unidade) || empty($quantidade) || empty($categoria)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_prodU = $pdo->prepare("INSERT INTO item(dataEntrada, material, unidade, quantidade, categoria) 
        VALUES(:dataEntrada, :material, :unidade, :quantidade, :categoria)");
        $cad_prodU->execute(array(
            ':dataEntrada'=> $dataEntrada,
            ':material'=> $material,
            ':unidade'=> $unidade,
            ':quantidade'=> $quantidade,
             ':categoria'=> $categoria    
        ));

        echo "<script>
        alert('Item Cadastrada com sucesso!');
        </script>";
    }
?>