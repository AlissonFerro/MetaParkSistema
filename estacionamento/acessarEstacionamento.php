<?php 

session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

$date = new DateTime('now',new DateTimeZone('-0300'));
$stringDate = $date->format('Y-m-d H:i:s');

$_SESSION['idVeiculo'] = $_GET['idVeiculo'];

if($login->acessoVeiculo($_SESSION['idUsuario'], $_SESSION['idVeiculo'], $stringDate)){
    echo "Acesso liberado";
    $_SESSION['idAcesso'] = $login->buscaAcesso($_SESSION['idUsuario'],$_SESSION['idVeiculo']);
}else{
    echo "Acesso negado";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Selecionar Veículo</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
    <a class="botao botao-block" id="sair" href="sair.php">Sair</a><br>
</body>
</html>