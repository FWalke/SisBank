<?php
include "conexao.php";

if (isset($_GET['conta'])) {
    $conta = mysqli_real_escape_string($conexao, $_GET['conta']);

    $sql = "UPDATE tbcontas SET status = 'I' WHERE conta = '$conta'";

    if (mysqli_query($conexao, $sql)) {
        echo "Conta fechada com sucesso!";
    } else {
        echo "Erro ao fechar conta: " . mysqli_error($conexao);
    }
} else {
    echo "Nenhuma conta especificada.";
}
?>
<a href="fecharconta.php">Voltar</a>