<?php

class pedidosDTO {
    
    private $idpedido;
    private $idcliente;
    private $cliente;
    private $valorPedido;
    private $dataPedido;
    private $descPedido;
    private $status;
    private $estado;
    
    function __construct() {
        
    }
    public function getIdpedido() {
        return $this->idpedido;
    }

    public function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }

        public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

        public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getValorPedido() {
        return $this->valorPedido;
    }

    public function setValorPedido($valorPedido) {
        $this->valorPedido = $valorPedido;
    }

    public function getDataPedido() {
        return $this->dataPedido;
    }

    public function setDataPedido($dataPedido) {
        $this->dataPedido = $dataPedido;
    }

    public function getDescPedido() {
        return $this->descPedido;
    }

    public function setDescPedido($descPedido) {
        $this->descPedido = $descPedido;
    }
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }






}

?>
