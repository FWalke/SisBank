<?php
 include "conexao.php";

 $xnome = $_POST['nome'];

 $sql= mysqli_query($conexao, "DELETE FROM tbusuarios WHERE nome='$xnome'");
 echo "Excluido com sucesso!";
 ?>
 <a href="excluir.php">Voltar</a> 