<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saque - BrenoVerse Finance</title>
    <link rel="stylesheet" href="usuario.css">
</head>
<header>
    <div class="logo">BrenoVerse Finance</div>
</header>
<main>
    <h1><font color="green">Realizar Saque</font></h1> 
    <form method="post" action="">
        <label>Conta: </label> 
        <input name="conta" type="text" value="<?php echo $_GET['conta']; ?>" >
        <br>
        <label>Agência: </label><input name="agencia" type="text" value="<?php echo $_GET['agencia']; ?>" >
        <br>
        <label>Data de Lançamento: </label>
        <input name="data_lanc" type="date" required>
        <br>
        <label>Valor do Saque: </label>
        <input name="valor" type="number" required>
        <br>
        <button type="submit" name="confirmar" style="background-color:green; color: white">Confirmar Saque</button>
        <button style="background-color:green; color: white"><a href="depositar.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a></button>

    </form>
</main>
</body>
</html>

<?php
include "conexao.php";

if (isset($_POST['confirmar'])) {
    $conta = $_POST['conta'];
    $agencia = $_POST['agencia'];
    $data_lanc = $_POST['data_lanc'];
    $valor = $_POST['valor'];

    $query = "INSERT INTO tblancamentos (conta, agencia, data_lanc, valor, tipo) VALUES ('$conta', '$agencia', '$data_lanc', '$valor', 'D')";
    if (mysqli_query($conexao, $query)) {
        echo "<p style='color: green;'>Saque realizado com sucesso!</p>";
    } else {
        echo "<p style='color: red;'>Erro ao realizar o depósito: " . mysqli_error($conexao) . "</p>";
    }
}
?>
