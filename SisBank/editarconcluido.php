<?php
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conta = mysqli_real_escape_string($conexao, $_POST['conta']);
    $cliente = mysqli_real_escape_string($conexao, $_POST['cliente']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $data_abertura = mysqli_real_escape_string($conexao, $_POST['data_abertura']);
    $data_vencimento = mysqli_real_escape_string($conexao, $_POST['data_vencimento']);
    

    $sql = "UPDATE tbcontas SET cliente = '$cliente',
            email = '$email',
            endereco = '$endereco',
            telefone = '$telefone',
            cpf = '$cpf',
            data_abertura = '$data_abertura',
            data_vencimento = '$data_vencimento',
            status = '$status'
        WHERE conta = '$conta'
    ";

    if (mysqli_query($conexao, $sql)) {
        echo "Conta atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar conta: " . mysqli_error($conexao);
    }
}
?>
 <link rel="stylesheet" href="styles.css">

    <br>
    <button><a href="editarcliente.php">Voltar</a></button>
