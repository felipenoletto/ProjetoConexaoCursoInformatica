<?php

require_once 'iLivroCaixa.php';
require_once 'conexao/conexao.php';

class livroCaixaDAO implements iLivroCaixa {

    public function salvar($livroCaixa) {


        $idCliente = $livroCaixa->getId_Cliente();
        $valor_total_venda = $livroCaixa->getValor_total_venda();


        try {
            $pdo = Conexao::getInstance();

            $sql = "INSERT INTO livrocaixa (idCliente,valor_total_venda)
            values (:idCliente,:valor_total_venda)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":valor_total_venda", $valor_total_venda, PDO::PARAM_STR);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar Livro Caixa", $e->getMessage();
        }
    }

    public function salvarSaida($livroCaixa) {
        $descricao_saida = $livroCaixa->getDesc_saida();
        $valor_saida = $livroCaixa->getValor_saida();
        $data_saida = $livroCaixa->getData_saida();

        try {
            $pdo = Conexao::getInstance();

            $sql = "INSERT INTO livrocaixa (descricao_saida,valor_saida,data_saida)
            values (:descricao_saida,:valor_saida,:data_saida)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":descricao_saida", $descricao_saida, PDO::PARAM_STR);
            $stmt->bindParam(":valor_saida", $valor_saida, PDO::PARAM_STR);
            $stmt->bindParam(":data_saida", $data_saida, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar Saida", $e->getMessage();
        }
    }

    public function getAllLivroCaixa() {
        try {
            $pdo = Conexao::getInstance();

            $sql = "select *from livrocaixa";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar Saida", $e->getMessage();
        }
    }

    public function getByData($datainicio, $datafinal) {
        try {

            $pdo = Conexao::getInstance();

            $sql = "select *from livrocaixa where data_saida BETWEEN ':datainicio' AND ':datafinal'";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":datainicio", $datainicio, PDO::PARAM_STR);
            $stmt->bindParam(":datafinal", $datafinal, PDO::PARAM_STR);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar Saida", $e->getMessage();
        }
    }

}

?>
