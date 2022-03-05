<?php

session_start();
require "logica.php";
require "verificaLogin.php";

$login = new Login($mysql);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['senha']===$_POST['confirmaSenha']){
        //$login->cadastrarUsuario($_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['login'],$_POST['senha']);
        echo "Cadastrado com sucesso";
        header('Location: login.php');
        die();
    }else{

        echo "Senha e confirmação não conferem";        
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastrar Usuario</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
        <h2>Cadastrar</h2>

        <form action="cadastrarUsuario.php" method="POST">
            Nome<br>
            <textarea rows="1" cols="20" name="nome"></textarea><br>
            Sobrenome<br>
            <textarea rows="1" cols="20" name="sobrenome"></textarea><br>
            CPF<br>
            <textarea rows="1" cols="20" name="cpf"></textarea><br>
            Login<br>
            <textarea rows="1" cols="20" name="login"></textarea><br>
            Senha<br>
            <textarea rows="1" cols="20" name="senha"></textarea><br>
            Confirmar Senha<br>
            <textarea rows="1" cols="20" name="confirmaSenha"></textarea><br>

            <button class="botao botao-block" href="cadastrarUsuario.php">Cadastrar</button><br><br>
        </form>

        <a href="index.php">Voltar</a>
        </p>
    </div>
</body>

</html>