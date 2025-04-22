
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrenoVerse Finance</title>
    <link rel="stylesheet" href="usuario.css">
</head>
<header>
        <div class="logo">BrenoVerse Finance</div>
        <nav>
        </nav>
</header>
<main>
<h1><font color="green">Depositar</font></h1> 


    <form method="post" action="">
<label>Conta: </label> 
<input name="conta" size="10" type="text">
<br>
<label>Agencia</label>
<input name="agencia" size="4" type="text">
<br>
<button type="submit" name='enviar' style="background-color:green; color: white">Confirmar</button>
<button style="background-color:green; color: white"><a href="menulancamento.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a></button>
    </form>

</main>

</body>
</html>
 
<?php 

   include "conexao.php";
   if (isset($_POST['enviar'])):
   $conta=$_POST['conta'];   
   $agencia=$_POST['agencia'];   

   $query = "SELECT * FROM tbcontas WHERE conta = '$conta' AND agencia = '$agencia'";
   $result = mysqli_query($conexao, $query);

$sql=mysqli_query($conexao, "SELECT INTO 
`tbcontas`(`conta`, `agencia`) VALUES('$conta', '$agencia')");

if (mysqli_num_rows($result) > 0) {
        header("Location: valordeposito.php?conta=$conta & agencia=$agencia");
        exit();
    } else {
        echo "<p style='color: red;'>Erro: nao deu.</p>";
    }
endif;

?>
