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


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="container">
        <h1>Entrar</h1>
        
            <p>
                <form action="entrar.php" method="POST">
                    login: <input type="text" name="login"><br>
                    senha: <input type="password" name="senha"><br><br>
                    
                    <button type = "submit">
                        Entrar
                    </button>
                </form>
                <button>
                    <a href="cadastrarUsuario.php" style = "text-decoration:none">
                        Cadastrar-se
                    </a>
                </button>

            </p> 
              
            <section class="mapa">
                <h3 class="titulo-principal">"Nosso estabelecimento</h3>
                <p>Nosso estabelecimento está localizado no coração da cidade.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.194700851715!2d-49.266616284440026!3d-25.431753439191276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dce46a7378e659%3A0x3da21abf622e9d7d!2sR.%20Conselheiro%20Laurindo%2C%20582%20-%20Centro%2C%20Curitiba%20-%20PR%2C%2080060-100!5e0!3m2!1spt-BR!2sbr!4v1646437606251!5m2!1spt-BR!2sbr" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </section>
    </div>
</body>

</html>