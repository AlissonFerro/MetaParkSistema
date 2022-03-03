<?php 

class Questoes{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaQuestao = $this->mysql->prepare("SELECT Enunciado, AlternativaA, AlternativaB, AlternativaC, AlternativaD, AlternativaE, Gabarito FROM QUESTOES WHERE ID_QUESTAO=?");
        $selecionaQuestao->bind_param('s', $id);
        $selecionaQuestao->execute();
        $questao = $selecionaQuestao->get_result()->fetch_assoc();
        return $questao;
    }

    public function quantidadeQuestoes(): int
    {
        $quantidadeQuestoes = $this->mysql->prepare("SELECT COUNT(ENUNCIADO) FROM questoes");
        $quantidadeQuestoes->execute();
        $quantidade = $quantidadeQuestoes->get_result()->fetch_all();
        return $quantidade;
    }

    public function minId(): int
    {
        $idMin = $this->mysql->prepare("SELECT MIN(ID_QUESTAO) FROM questoes;");
        $idMin->execute();
        $quantidade = $idMin->get_result()->fetch_column(0);
        return $quantidade;
    }

    public function maxId(): int
    {
        $idMin = $this->mysql->prepare("SELECT MAX(ID_QUESTAO) FROM questoes;");
        $idMin->execute();
        $quantidade = $idMin->get_result()->fetch_column(0);
        return $quantidade;
    }
}


?>