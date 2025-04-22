<?php
 include "conexao.php";

 $nome = $_POST['nome'];

 $sql= mysqli_query($conexao, "DELETE FROM tbgerentes WHERE gerente='$nome'");
 echo "Excluido com sucesso!";
 ?>
 <a href="excluirgerente.php">Voltar</a>