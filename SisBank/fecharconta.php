<html>
<head>
    <title>Fechar Conta</title>
</head>
<body>
    <h1>Fechar Conta</h1>
    <?php
    include "conexao.php";

    $selbanco = mysqli_query($conexao, "SELECT * FROM tbcontas WHERE status = 'A' ORDER BY conta");
    if (mysqli_num_rows($selbanco) > 0) {
        while ($l = mysqli_fetch_array($selbanco)) {
            $conta = $l['conta'];
            $cliente = $l['cliente'];
            $banco = $l['banco'];
            $agencia = $l['agencia'];
            $status = $l['status'] === 'A' ? 'Ativa' : 'Inativa';


            echo "<strong>Conta:</strong> $conta <br />";
            echo "<strong>Nome do Cliente:</strong> $cliente <br />";
            echo "<strong>Banco:</strong> $banco <br />";
            echo "<strong>Agência:</strong> $agencia <br />";
            echo "<strong>Status:</strong> $status <br />";

            
            echo "<a href='fecharcontaconcluido.php?conta=$conta'>Fechar Conta</a>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma conta ativa encontrada.";
    }
    ?>

    <button><a href="menucontas.php">Voltar</a></button>
</body>
</html>
