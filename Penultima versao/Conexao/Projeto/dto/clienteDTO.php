<?php

class clienteDTO {
    
    private $idcliente;
    private $nome;
    private $rg;
    private $cpf;
    private $telefone;
    private $idcidade;
    private $cep;
    private $endereco;
    private $email;
    private $status;
    private $pnome;
    


    public function __construct() {
        
    }
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getIdcidade() {
        return $this->idcidade;
    }

    public function setIdcidade($idcidade) {
        $this->idcidade = $idcidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
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
