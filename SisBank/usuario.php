
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
<h1><font color="green">Funcionarios, Cadastro de usuarios</font></h1> 
    <form method="post" action="">
<label>Nome: </label> 
<input name="nome" type="text">
<br>
<label>senha</label>
<input name="senha" type="text">
<br>
<button type="submit" name='enviar' style="background-color:green; color: white">Cadastrar</button>
<button type="submit" name='Excluir' style="background-color:green; color: white">Excluir</button>
<button style="background-color:green; color: white"><a href="./index.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a></button>
    </form>

</main>

</body>
</html>
 
<?php 

   include "conexao.php";
   if (isset($_POST['enviar'])):
   $senha=filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
   $senha_crip=password_hash($senha,PASSWORD_DEFAULT);
   $nome=$_POST['nome'];   

$sql=mysqli_query($conexao, "INSERT INTO 
`tbusuarios`(`nome`, `senha`) VALUES('$nome', '$senha_crip')");
endif;


if (isset($_POST['Excluir'])):
    header("location: excluir.php");
endif;

?>

