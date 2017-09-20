<?php

interface iCliente {
    
    public function getAllEstados();
      
    public function getAllCidadesByIdEstado($idEstado);
    
    public function salvar($cliente);
    
    public function getAllcliente();
    
    public function deleteByIdcliente($id);
    
    public function getByIdcliente($id);
    
    public function updatecliente(clienteDTO $clienteDTO);
    
    public function updateClienteStatus($status, $id);
    
    public function getBynomecliente($nome);
    
    public function getBystatuscliente($status);
    
    public function getNomeByidCliente($idcliente);
    
    
}

?>
