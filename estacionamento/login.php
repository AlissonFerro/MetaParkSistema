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
        <fieldset>
            <form action="entrar.php" method="POST">
                <div class="conteudo">

                    <div class="entrar">

                        <Label>login: </Label><br>
                        <input type="text" name="login" placeholder="Digite seu e-mail"><br>

                        <label for="">senha: </label><br>
                        <input type="password" name="senha" placeholder="Digite a senha">

                    </div>

                    <div class="botoes">
                        <button type="submit">
                            Entrar
                        </button>
                        <button>
                            <a href="cadastrarUsuario.php" style="text-decoration:none">
                                Cadastrar-se
                            </a>
                        </button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>

</html>
