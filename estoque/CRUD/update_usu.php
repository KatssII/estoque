<?php
require('../conn.php');

$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];

if(empty($nome) || empty($email) || empty($senha) || empty($cpf) || empty($id_usuario)){
    echo "Os valores não podem ser vazios";
}else{
    $update_usuario = $pdo->prepare("UPDATE usuario SET 
    nome = :nome, 
    email = :email, 
    senha = :senha, 
    cpf = :cpf WHERE 
    id_usuario = :id_usuario");

    $update_usuario->execute(array(
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha,
        ':cpf' => $cpf,
        ':id_usuario' => $id_usuario
    ));

    echo "<script>
        alert('Usuário editado com sucesso!');
        window.location.href = '../tabela_usu.php'; // Redireciona para a página inicial após o alerta
    </script>";
}
?>
