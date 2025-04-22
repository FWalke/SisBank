<html>
 <head>
 <title> Exclusao de usuario</title>
 </head>
 <body>
 <h1>Exclusao de usuario</h1>

 <?php
 include "conexao.php";
   $nome = $_GET['nome'];
   $sql = mysqli_query($conexao, "SELECT * FROM tbusuarios WHERE nome='$nome'");
 while ($linha=mysqli_fetch_array($sql))
  {
     
    $xnome = $linha['nome'];
   }
 ?>

  
 <form method="post" action="delete.php">

 nome: <input name="nome" type="text" value="<?php echo $nome;?>">
 <br>

 <input type="submit" value="Confirmar Excluir">
 <a href="excluir.php">Cancelar</a>

 </form>

 </body>
 </html>