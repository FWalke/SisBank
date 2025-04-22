<?php
ini_set('default_charset', 'UTF-8');
include "conexao.php";
?>

<html>
<head>
    <title>Saldo da Conta</title>
</head>

<body>
    <h1><font color="green">Saldo da Conta</font></h1>

    <form method="post" action="">
    <label>Conta: </label> 
    <input name="conta" type="text" value="<?php echo $_GET['conta']; ?>" >
    <br>
    <label>Agência: </label>
    <input name="agencia" type="text" value="<?php echo $_GET['agencia']; ?>" >
    <br>
    <button type="submit" name="consultar" style="background-color:green; color: white">Consultar</button>
    </form>

    <a href="index.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a>

    <?php
    if (isset($_POST['consultar'])):
        $conta = filter_input(INPUT_POST, 'conta', FILTER_SANITIZE_STRING);
        $query = "SELECT tipo, valor FROM tblancamentos WHERE conta = '$conta'";
        $result = mysqli_query($conexao, $query);

        if (mysqli_num_rows($result) > 0):
            $totalC = 0; 
            $totalD = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['tipo'] == 'C') {
                    $totalC += $row['valor'];
                } elseif ($row['tipo'] == 'D') {
                    $totalD += $row['valor'];
                }
            }

            $saldo = $totalC - $totalD;
            echo "<h3>Total de Depósitos: R$ " . number_format($totalC, 2, ',', '.') . "</h3>";
            echo "<h3>Total de Saques: R$ " . number_format($totalD, 2, ',', '.') . "</h3>";
            echo "<h2>Saldo Final: R$ " . number_format($saldo, 2, ',', '.') . "</h2>";

        else:
            echo "<p style='color: red;'>Erro: Nenhum lançamento encontrado para a conta $conta.</p>";
        endif;
    endif;
    ?>
</body>
</html>
