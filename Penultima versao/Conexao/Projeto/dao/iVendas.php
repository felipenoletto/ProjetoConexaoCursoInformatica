<?php

interface iVendas {
    
    
    public function salvar($vendas);
    
    public function getAllvendas();
    
    public function deleteByIdvendas($id);
    
    public function getByIdvendas($id);
    
    public function updatevendas(vendasDTO $vendasDTO);
    
    public function updateVendasStatus($status, $id);
    
    public function updateEstadoPedido($idpedido, $newestado);
    

    
    
}

?>
