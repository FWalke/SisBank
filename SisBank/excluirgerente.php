<html>
 <head>
 <title> Excluir gerente</title>
 </head>
 <body>
 <?php

include "conexao.php";

$selbanco = mysqli_query ($conexao, "SELECT * FROM tbgerentes ORDER BY gerente");
while ($l=mysqli_fetch_array($selbanco))
{

    $nome = $l['gerente'];
    $senha = $l['senha'];
    echo "<strong>Nome:</strong> $nome <br />";
    echo "<a href=apagargerente.php?gerente=$nome>Deletar</a>";
    echo "<hr></hr>";

}

 ?>

 <button><a href="gerente.php">Voltar</a></button>
 </body>
 </html>