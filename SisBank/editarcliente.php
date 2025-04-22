<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Dados da Conta</h1>
    <?php
    include "conexao.php";

    // Obtendo o número da conta pela URL
    if (isset($_GET['conta'])) {
        $conta = mysqli_real_escape_string($conexao, $_GET['conta']);

        // Buscando os dados da conta no banco
        $sql = "SELECT * FROM tbcontas WHERE conta = '$conta'";
        $result = mysqli_query($conexao, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $dados = mysqli_fetch_assoc($result);
        } else {
            echo "Conta não encontrada.";
            exit;
        }
    } else {
        echo "Nenhuma conta especificada.";
        exit;
    }
    ?>

    <form action="editarconcluido.php" method="POST">
        <input type="hidden" name="conta" value="<?= $dados['conta'] ?>">

        <label for="cliente">Nome do Cliente:</label>
        <input type="text" id="cliente" name="cliente" value="<?= $dados['cliente'] ?>" maxlength="30" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $dados['email'] ?>" maxlength="30"><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" value="<?= $dados['endereco'] ?>" maxlength="40"><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?= $dados['telefone'] ?>" maxlength="15" placeholder="(00) 00000-0000"><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?= $dados['cpf'] ?>" maxlength="14" placeholder="000.000.000-00" required><br>

        <label for="data_abertura">Data de Abertura:</label>
        <input type="date" id="data_abertura" name="data_abertura" value="<?= $dados['data_abertura'] ?>" required><br>

        <label for="data_vencimento">Data de Vencimento:</label>
        <input type="date" id="data_vencimento" name="data_vencimento" value="<?= $dados['data_vencimento'] ?>"><br>

      <!-- <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="A" <?= $dados['status'] === 'A' ? 'selected' : '' ?>>Ativa</option>
            <option value="I" <?= $dados['status'] === 'I' ? 'selected' : '' ?>>Inativa</option>
        </select><br><br> -->

        <button type="submit">Salvar Alterações</button>
    </form>

    <button><a href="editarconta.php">Voltar</a></button>
</body>
</html>
