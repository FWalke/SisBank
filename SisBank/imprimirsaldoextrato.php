<?php
ini_set('default_charset', 'UTF-8');
include "conexao.php";
?>

<html>
<head>
    <title>Extrato de Conta</title>
</head>

<body>
    <h1><font color="green">Extrato de Conta</font></h1>

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
            echo "<h2>Extrato da Conta: $conta</h2>";
            echo "<table border='1' style='border-collapse: collapse; width: 50%;'>";
            echo "<tr>
                    <th>Tipo</th>
                    <th>Valor</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $tipo = $row['tipo'] == 'C' ? 'Depósito' : 'Saque';
                $valor = $row['valor'];

                echo "<tr>
                        <td>$tipo</td>
                        <td>R$ " . number_format($valor, 2, ',', '.') . "</td>
                      </tr>";
            }

            echo "</table>";
        else:
            echo "<p style='color: red;'>Erro: Nenhum lançamento encontrado para a conta $conta.</p>";
        endif;
    endif;
    ?>
</body>
</html>