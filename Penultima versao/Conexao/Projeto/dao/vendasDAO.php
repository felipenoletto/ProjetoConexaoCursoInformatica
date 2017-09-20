<?php

require_once 'iVendas.php';
require_once 'conexao/conexao.php';

class vendasDAO implements iVendas {

    public function salvar($vendas) {


        $idpedidos = $vendas->getIdpedidos();
        $valor_pedido = $vendas->getValor_pedido();
        $forma_pagamento = $vendas->getForma_pagamento();
        $valor_total = $vendas->getValor_total();
        $data_pedido = $vendas->getData_pedido();
        $data_venda = $vendas->getData_Venda();
        $status = $vendas->getStatus();


        try {
            $pdo = Conexao::getInstance();

            $sql = "INSERT INTO vendas (idpedidos,valor_pedido,forma_pagamento,valor_total,data_pedido,data_venda,status)
            values (:idpedidos,:valor_pedido,:forma_pagamento,:valor_total,:data_pedido,:data_venda,:status)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":idpedidos", $idpedidos, PDO::PARAM_INT);
            $stmt->bindParam(":valor_pedido", $valor_pedido, PDO::PARAM_STR);
            $stmt->bindParam(":forma_pagamento", $forma_pagamento, PDO::PARAM_STR);
            $stmt->bindParam(":valor_total", $valor_total, PDO::PARAM_INT);
            $stmt->bindParam(":data_pedido", $data_pedido, PDO::PARAM_STR);
            $stmt->bindParam(":data_venda", $data_venda, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao Cadastrar a venda", $e->getMessage();
        }
    }

    public function getAllvendas() {
        try {
            $pdo = Conexao::getInstance();
            //$sql = "SELECT * FROM vendas";
            $sql = " SELECT idvendas,idpedidos,valor_pedido,forma_pagamento,valor_total,data_pedido,data_venda,status
                     FROM vendas";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
    }

    public function deleteByIdvendas($id) {

        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM vendas WHERE idvendas = :idvendas ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idvendas", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getByIdvendas($idvendas) {
        try {

            $pdo = Conexao::getInstance();

            $sql = " SELECT idvendas,idpedidos,valor_pedido,forma_pagamento,valor_total,data_pedido,nome_vendedor,nome_cliente,status
                     FROM vendas";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idvendas", $idvendas, PDO::PARAM_INT);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updatevendas(vendasDTO $vendasDTO) {

        try {

            $idvendas = $vendas->getIdvendas();
            $idpedidos = $vendas->getIdpedidos();
            $valor_pedido = $vendas->getValor_pedido();
            $forma_pagamento = $vendas->getForma_pagamento();
            $valor_total = $vendas->getValor_total();
            $data_pedido = $vendas->getData_pedido();
            $nome_vendedor = $vendas->getNome_vendedor();
            $nome_cliente = $vendas->getNome_cliente();

            $pdo = Conexao::getInstance();
            $sql = "UPDATE vendas SET 
                   idvendas=:idvendas,idpedidos=:idpedidos, valor_pedido=:valor_pedido, forma_pagamento=:forma_pagamento, 
                   valor_total=:valor_total, data_pedido=:data_pedido,nome_vendedor=:nome_vendedor,nome_cliente=:nome_cliente
                   WHERE idvendas = :idvendas";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idvendas", $idvendas);
            $stmt->bindParam(":idpedidos", $idpedidos);
            $stmt->bindParam(":valor_pedido", $valor_pedido);
            $stmt->bindParam(":forma_pagamento", $forma_pagamento);
            $stmt->bindParam(":valor_total", $valor_total);
            $stmt->bindParam(":data_pedido", $data_pedido);
            $stmt->bindParam(":nome_vendedor", $nome_vendedor);
            $stmt->bindParam(":nome_cliente", $nome_cliente);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateVendasStatus($status, $idvendas) {


        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE vendas SET status=:status where idvendas=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $idvendas);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updateEstadoPedido($idpedidos, $estado) {
            try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE pedidos SET estado=:estado where idpedidos=:idpedidos";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":estado", $estado);
            $stmt->bindParam(":idpedidos", $idpedidos);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }
}

?>
