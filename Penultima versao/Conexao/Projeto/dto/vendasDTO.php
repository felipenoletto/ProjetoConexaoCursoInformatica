<?php

class vendasDTO {
    
    private $idvendas;
    private $idcliente;
    private $idpedidos;
    private $valor_pedido;
    private $forma_pagamento;
    private $valor_total;
    private $data_pedido;
    private $data_venda;
    private $nome_vendedor;
    private $nome_cliente;
    private $status;
    private $pnome;
    
    public function getIdvendas() {
        return $this->idvendas;
    }

    public function setIdvendas($idvendas) {
        $this->idvendas = $idvendas;
    }
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    
    public function getIdpedidos() {
        return $this->idpedidos;
    }

    public function setIdpedidos($idpedidos) {
        $this->idpedidos = $idpedidos;
    }

    public function getValor_pedido() {
        return $this->valor_pedido;
    }

    public function setValor_pedido($valor_pedido) {
        $this->valor_pedido = $valor_pedido;
    }

    public function getForma_pagamento() {
        return $this->forma_pagamento;
    }

    public function setForma_pagamento($forma_pagamento) {
        $this->forma_pagamento = $forma_pagamento;
    }


    public function getValor_total() {
        return $this->valor_total;
    }

    public function setValor_total($valor_total) {
        $this->valor_total = $valor_total;
    }

    public function getData_pedido() {
        return $this->data_pedido;
    }

    public function setData_pedido($data_pedido) {
        $this->data_pedido = $data_pedido;
    }

    public function getData_venda() {
        return $this->data_venda;
    }

    public function setData_venda($data_venda) {
        $this->data_venda = $data_venda;
    }

    public function getNome_vendedor() {
        return $this->nome_vendedor;
    }

    public function setNome_vendedor($nome_vendedor) {
        $this->nome_vendedor = $nome_vendedor;
    }

    public function getNome_cliente() {
        return $this->nome_cliente;
    }

    public function setNome_cliente($nome_cliente) {
        $this->nome_cliente = $nome_cliente;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getPnome() {
        return $this->pnome;
    }

    public function setPnome($pnome) {
        $this->pnome = $pnome;
    }




    
}

?>
