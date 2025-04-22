<?php
ini_set('default_charset', 'UTF-8');
include "conexao.php";
?>

<html>
<head>
<title>Login de conta para ver o extrato</title>
</head>

<h1><font color="green">Login de conta para ver o extrato</font></h1>

<form method="post" action="">
    <label>Conta: </label>
    <input name="conta" size="10" type="text">
    <br>
    <label>Agência:</label>
    <input name="agencia" size="4" type="text">
    <br>
    <label>Senha:</label>
    <input name="senha" size="6" type="password">
    <br>
    <button type="submit" name="confirmar" style="background-color:green; color: white">Confirmar</button>
    <button style="background-color:green; color: white">
        <a href="index.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a>
    </button>
</form>
 
</html>

<?php
if (isset($_POST['confirmar'])):
    $conta=$_POST['conta'];   
    $agencia=$_POST['agencia']; 
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

    $query = "SELECT * FROM tbcontas WHERE conta = '$conta' AND agencia = '$agencia'";
    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) > 0) {
        $linha = mysqli_fetch_array($result);
        $senha_crip = $linha['senha'];

        if (password_verify($senha, $senha_crip)) {
            header("Location: saldototal.php?conta=$conta&agencia=$agencia");
            exit();
        } else {
            echo "<p style='color: red;'>Erro: Senha não confere.</p>";
        }
    } else {
        echo "<p style='color: red;'>Erro: Conta ou agência não encontrada.</p>";
    }
endif;
?>
