<?php
ini_set('default_charset', 'UTF-8');
?>

<html>
<head>
<title> Login do Funcionario </title>
</head>

<header>
        <div class="logo">BrenoVerse Finance</div>
        <nav>

        </nav>
</header> 

<main>

<h1><font color="green">Login do Funcionario</font></h1>

<form method="post" action="">
<label> Senha Funcionario: </label>
     <input name="senha" size="6" type="password">
     <br>

<button type="submit" name="Confirmar" style="background-color:green; color: white"> Confirmar </button>
<button type="submit" name="Voltar" style="background-color:green; color: white"> Voltar </button>
</form>

</main>


</html>

<?php
   include "conexao.php";

if (isset($_POST['Confirmar'])):
    
    $senha=filter_input(INPUT_POST, 'senha',FILTER_DEFAULT);
    $selbanco = mysqli_query ($conexao, "SELECT * FROM tbusuarios");

$status=0;

while ($l=mysqli_fetch_array($selbanco))
{
    $senha_crip = $l['senha'];

if(password_verify($senha, $senha_crip))
{
    $status=1;
}
}

if($status==0)
{
    echo "senha não confere";
}
else
{
    header("Location: menucontas.php");

}

endif;

    if (isset($_POST['Voltar'])):
    header("Location: index.php");
    endif;
?>

