<?php
require('../conn.php');

$material = $_POST['material'];
$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$id_item = $_POST['id_item'];

if (empty($material) || empty($unidade) || empty($quantidade) || empty($categoria)) {
    echo "Os valores não podem ser vazios";
} else {
    $update_item = $pdo->prepare("UPDATE item SET
        material = :material, 
        unidade = :unidade, 
        quantidade = :quantidade,
        categoria = :categoria 
        WHERE id_item = :id_item;");

    $update_item->execute(array(
        ':material' => $material,
        ':unidade' => $unidade,
        ':quantidade' => $quantidade,
        ':categoria' => $categoria,
        ':id_item' => $id_item
    ));

    header("Location: ../tabela_prodU.php");
    exit();
}
?>