<html>
  <head>
  <title> Gerente</title>
 </head>
 <body>
<h1>Cadastro de gerentes</h1>
<form method="post" action="">
<label> Usuario: </label>
     <input name="nome" size="30" type="text">
     <br><br>
     <label>Senha</label>
     <input name="senha" size="6" type="text">
     <br><br>
     <button type="submit" name="enviar"> Cadastrar </button>
     <button type="submit" name="excluir"> Excluir </button>
     <button type="submit" name="fim"> Fim </button>
     <br><br>
</form>
</body>
</html>

<?php 

   include "conexao.php";
   if (isset($_POST['enviar'])):
   $senha=filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
   $senha_crip=password_hash($senha,PASSWORD_DEFAULT);
   $nome=$_POST['nome'];   

$sql=mysqli_query($conexao, "INSERT INTO 
`tbgerentes`(`gerente`, `senha`) VALUES('$nome', '$senha_crip')");
endif;


if (isset($_POST['excluir'])):
    header("location: excluirgerente.php");
endif;

?>
