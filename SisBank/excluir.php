<html>
 <head>
 <title> Excluir Clientes</title>
 </head>
 <body>
 
<?php
include "conexao.php";
$selbanco = mysqli_query ($conexao, "SELECT * FROM tbusuarios ORDER BY nome");
while ($l=mysqli_fetch_array($selbanco))
{
    $nome = $l['nome'];

    echo "<strong>Nome:</strong> $nome <br />";
    
    echo "<a href=apagar.php?nome=$nome>Deletar</a>";
    echo "<hr></hr>";

}
 
 ?>

 <button><a href="usuario.php">Voltar</a></button>
 </body>
 </html>