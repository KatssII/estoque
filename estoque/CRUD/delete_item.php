<?php
require('../conn.php');
if (isset($_GET['item'])) {
    $id_item = $_GET['item'];
} else {
    #header("Location: menu.php");
}

$delete_itens_retirados = $pdo->prepare('DELETE FROM itens_retirados WHERE id_item = :item');
$delete_itens_retirados->bindParam(':item', $id_item);
$delete_itens_retirados->execute();

$del_item = $pdo->prepare('DELETE FROM item WHERE id_item = :item');
$del_item->bindParam(':item', $id_item);
$del_item->execute();
echo "<script>
    alert('Item deletado com sucesso!');
    window.location.href = '../tabela_entrada.php'; // Redireciona para a página inicial após o alerta
</script>";
?>


