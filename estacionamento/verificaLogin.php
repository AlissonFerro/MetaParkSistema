<?php 
class Login{
    private $mysql;    
    
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function VerificaLogin(string $login){
        $consulta = $this->mysql->prepare("SELECT Nome FROM usuario WHERE login = ?");
        $consulta->bind_param('s', $login);
        $consulta->execute();
        $result = $consulta->get_result()->fetch_assoc();

        if(empty($result)){
            echo "<br> Não existe registros<br>";
            return false;
        }else{
            return true;
        }
    }

    public function VerificaSenha(string $senha){
        $comparaSenha = $this->mysql->prepare("SELECT Nome FROM usuario WHERE senha = ?");
        $comparaSenha->bind_param('s', md5($senha));
        $comparaSenha->execute();
        $result = $comparaSenha->get_result()->fetch_assoc();

        if(empty($result)){
            echo "<br> Não existe registros<br>";
            return false;
        }else{
            return true;
        }
    }

    public function buscarUsuario(string $login): array
    {
        $consulta = $this->mysql->prepare("SELECT idUsuario, Nome, Sobrenome FROM `usuario` WHERE login=?");
        $consulta->bind_param('s', $login);
        $consulta->execute();
        $usuario = $consulta->get_result()->fetch_assoc();
        return $usuario;
    }

    public function veiculoPorId(string $id): array
    {
        $consulta = $this->mysql->prepare("SELECT Marca, Modelo, Placa FROM Veiculo WHERE idUsuario=?");
        $consulta->bind_param('s', $id);
        $consulta->execute();
        $veiculo = $consulta->get_result()->fetch_all();
        return $veiculo;
    }

    public function quantidadeVeiculos(string $id)
    {
        $consulta = $this->mysql->prepare("SELECT count(idVeiculo) FROM Veiculo WHERE idUsuario=?");
        $consulta->bind_param('s', $id);
        $consulta->execute();
        $qtdVeiculos = $consulta->get_result()->fetch_all();
        return $qtdVeiculos;
    }

    public function cadastrarVeiculo(string $marca, string $modelo, string $placa, string $id)
    {
        $cadastrar = $this->mysql->prepare("INSERT INTO Veiculo (`Marca`, `Modelo`, `Placa`, `idUsuario`)  VALUES (?,?,?,?);");
        $cadastrar->bind_param('ssss', $marca, $modelo, $placa, $id);
        $cadastrar->execute();
    }

    public function acessoVeiculo(int $idUsuario, string $idVeiculo, $entrada){
        $cadastrar = $this->mysql->prepare("INSERT INTO entrada (`idUsuario`, `idVeiculo`, `Entrada`) VALUES (?,?,?);");
        $cadastrar->bind_param('sss', $idUsuario, $idVeiculo, $entrada);
        $cadastrar->execute();   

        return $cadastrar; 
    }

    public function saidaVeiculo(int $idAcesso, string $saida)
    {
        $sair = $this->mysql->prepare("UPDATE entrada SET Saida = ? WHERE idAcesso = ?;");
        $sair->bind_param('ss', $saida, $idAcesso);
        $sair->execute();
    }

    public function buscaAcesso(string $idUsuario, string $idVeiculo)
    {
        $buscar = $this->mysql->prepare("SELECT idAcesso FROM `entrada` WHERE idUsuario = ? and idVeiculo = ? and Saida IS NULL;");
        $buscar->bind_param('ss', $idUsuario, $idVeiculo);
        $buscar->execute();
        $result = $buscar->get_result()->fetch_column(0);
        
        return $result;
    }

    public function buscaHorario(string $idAcesso){
        $buscar = $this->mysql->prepare("SELECT Entrada FROM `entrada` WHERE idAcesso = ?;");
        $buscar->bind_param('s', $idAcesso);
        $buscar->execute();
        $result = $buscar->get_result()->fetch_column(0);
        
        return $result;
    }

    public function cadastrarUsuario(string $nome, string $sobrenome, string $cpf, string $login, string $senha)
    {
        $cadastrar = $this->mysql->prepare("INSERT INTO usuario (`Nome`, `Sobrenome`, `CPF`, `login`, `senha`)  VALUES (?,?,?,?,?);");
        $cadastrar->bind_param('sssss', $nome, $sobrenome, $cpf, $login, md5($senha));
        $cadastrar->execute();
    }   



}

?>