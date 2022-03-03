<?php

session_start();

$mysql = new mysqli('localhost','root','','estacionamento');
$mysql->set_charset('utf8');

if($mysql == FALSE){
    echo "Erro na conexão";
}

$_SESSION['teste'] = array();
if(!isset($_SESSION['tentativas'])){
    $_SESSION['tentativas'] = 0;
}

if($_SESSION['tentativas']>3){
    echo 'fim';
    $_SESSION['tentativas'] = 0;
    header('Location: /estacionamento/redefinirSenha.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Prova</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
        <h1>Entrar</h1>
        
            <p>
                <form action="entrar.php" method="POST">
                    login: <input type="text" name="login"><br>
                    senha: <input type="text" name="senha"><br><br>
                    
                    <button type = "submit">
                        Entrar
                    </button>
                </form>

            </p> 
              
    </div>
</body>

</html>