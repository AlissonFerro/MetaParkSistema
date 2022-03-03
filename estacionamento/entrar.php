<?php
session_start();
require_once "verificaLogin.php";
require_once "logica.php";

$login = new Login($mysql);

if ($mysql == FALSE) {
    echo "Erro na conexão";
} else

if (!$login->VerificaLogin($_POST['login']) && !$login->VerificaSenha($_POST['senha'])) {
    $_SESSION['tentativas']++;
    header('Location: /estacionamento/login.php');
    die();
}
else{
    $_SESSION['usuario'] = $_POST['login'];
    $usuario = $login->buscarUsuario($_POST['login']);
    $_SESSION['idUsuario'] = $usuario['idUsuario'];
    header('Location: /estacionamento/index.php');
}
?>