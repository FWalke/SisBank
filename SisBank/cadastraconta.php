<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Conta Cliente</title>
</head>
<body>

    <h2>Cadastro de Conta Cliente</h2>

    <form method="post" action="">
        <label for="conta">Número da Conta</label>
        <input type="text" name="conta" maxlength="10" >
        <br>
        <label for="senha">Senha</label>
        <input type="password"  name="senha" maxlength="6" >
        <br>
        <label for="agencia">Agência</label>
        <input type="text" name="agencia" maxlength="4" >
        <br>
        <label for="banco">Banco</label>
        <input type="text"  name="banco" maxlength="30" >
        <br>
        <label for="cliente">Nome do Cliente</label>
        <input type="text"  name="cliente" maxlength="30" >
        <br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" maxlength="14"  placeholder="000.000.000-00">
        <br>
        <label for="telefone">Telefone</label>
        <input type="text"  name="telefone" maxlength="15"  placeholder="(00) 00000-0000">
        <br>
        <label for="endereco">Endereço</label>
        <input type="text"  name="endereco" maxlength="40">
        <br>
        <label for="email">E-mail</label>
        <input type="email"  name="email" maxlength="30">
        <br>
        <label for="data_abertura">Data de Abertura</label>
        <input type="date" id="data_abertura" name="data_abertura" >
        <br>
        <label for="data_vencimento">Data de Vencimento</label>
        <input type="date" name="data_vencimento">
        <br>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="A">Ativa</option>
            <option value="I">Inativa</option>
        </select>
        <br>
        <button type="submit" name='enviar' style="background-color:green; color: white">Cadastrar</button>
        <button style="background-color:green; color: white"><a href="menucontas.php" style="background-color:green; color: white; text-decoration: none;">Voltar</a></button>
   </form>

</body>
</html>

<?php 

   include "conexao.php";
   if (isset($_POST['enviar'])):
   $senha=filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
   $senha_crip=password_hash($senha,PASSWORD_DEFAULT);
   $conta=$_POST['conta'];
   $agencia=$_POST['agencia'];   
   $banco=$_POST['banco'];
   $cliente=$_POST['cliente'];
   $cpf=$_POST['cpf'];
   $telefone=$_POST['telefone'];
   $endereco=$_POST['endereco'];
   $email=$_POST['email'];
   $data_abertura=$_POST['data_abertura'];
   $data_vencimento=$_POST['data_vencimento'];
   $status=$_POST['status'];
  

   $sql=mysqli_query($conexao, 
   "INSERT INTO `tbcontas` (`conta`, `senha`, `agencia`, `banco`, `cliente`, `cpf`, `telefone`, `endereco`, `email`, `data_abertura`, `data_vencimento`, `status`) 
   VALUES('$conta','$senha_crip','$agencia','$banco','$cliente','$cpf','$telefone','$endereco','$email','$data_abertura','$data_vencimento','$status')"
   );
   endif;

//<button type="submit" name='Excluir' style="background-color:green; color: white">Excluir</button>

//if (isset($_POST['Excluir'])):
//   header("location: excluircliente.php");
//endif;

?>

