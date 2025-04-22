<html>
<head>
    <title>Editar Conta</title>
</head>
<body>
    <h1>Editar Conta</h1>
    
    <?php
    include "conexao.php";
    $selbanco = mysqli_query($conexao, "SELECT * FROM tbcontas ORDER BY conta");
    while ($l = mysqli_fetch_array($selbanco)) 
    {
        $conta = $l['conta'];
        $cliente = $l['cliente'];
        $agencia = $l['agencia'];
        $banco = $l['banco'];
 //       $status = $l['status'] === 'A' ? 'Ativa' : 'Inativa';
 
        echo "<strong>Conta:</strong> $conta <br />";
        echo "<strong>Nome do Cliente:</strong> $cliente <br />";
        echo "<strong>Agência:</strong> $agencia <br />";
        echo "<strong>Banco:</strong> $banco <br />";
 //       echo "<strong>Status:</strong> $status <br />";
        
        echo "<a href=editarcliente.php?conta=$conta>Editar</a>";
        echo "<hr></hr>";
    }
    ?>

    <button><a href="menucontas.php">Voltar</a></button>
</body>
</html>