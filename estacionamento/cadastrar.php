<?php

session_start();
require "logica.php";
require "verificaLogin.php";

$login = new Login($mysql);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login->cadastrarVeiculo($_POST['marca'], $_POST['modelo'], $_POST['placa'], $_SESSION['idUsuario']);
    echo "Cadastrado com sucesso";
    header('Location: /estacionamento/index.php');
    die();
}

?>
