<html>
 <head>
 <title> Exclusao de Gerente</title>
 </head>
 <body>
 <h1>Exclusao de Gerente</h1>

 <?php
 include "conexao.php";
   $nome = $_GET['gerente'];
   $sql = mysqli_query($conexao, "SELECT * FROM tbgerentes WHERE gerente='$nome'");
 while ($linha=mysqli_fetch_array($sql))
  {
    
    $xnome = $linha['gerente'];
   }
 ?> 

 
 <form method="post" action="deletegerente.php">

 nome: <input name="nome" type="text" value="<?php echo $xnome;?>">
 <br>
 
 <input type="submit" value="Confirmar Excluir">
 <a href="excluirgerente.php">Cancelar</a>

 </form>

 </body>
 </html>