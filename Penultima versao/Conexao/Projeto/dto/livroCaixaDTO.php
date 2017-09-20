<?php

class livroCaixaDTO{
    
    private $id_LivroCaixa;
    private $id_Vendas;
    private $id_Cliente;
    private $valor_total_venda;
    private $desc_saida;
    private $valor_saida;
    private $data_saida;
    
    function __construct() {
        
    }
    public function getId_LivroCaixa() {
        return $this->id_LivroCaixa;
    }

    public function setId_LivroCaixa($id_LivroCaixa) {
        $this->id_LivroCaixa = $id_LivroCaixa;
    }

    public function getId_Vendas() {
        return $this->id_Vendas;
    }

    public function setId_Vendas($id_Vendas) {
        $this->id_Vendas = $id_Vendas;
    }

    public function getId_Cliente() {
        return $this->id_Cliente;
    }

    public function setId_Cliente($id_Cliente) {
        $this->id_Cliente = $id_Cliente;
    }

    public function getValor_total_venda() {
        return $this->valor_total_venda;
    }

    public function setValor_total_venda($valor_total_venda) {
        $this->valor_total_venda = $valor_total_venda;
    }

    public function getDesc_saida() {
        return $this->desc_saida;
    }

    public function setDesc_saida($desc_saida) {
        $this->desc_saida = $desc_saida;
    }

    public function getValor_saida() {
        return $this->valor_saida;
    }

    public function setValor_saida($valor_saida) {
        $this->valor_saida = $valor_saida;
    }

    public function getData_saida() {
        return $this->data_saida;
    }

    public function setData_saida($data_saida) {
        $this->data_saida = $data_saida;
    }



}

?>
