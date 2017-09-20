<?php
interface iPedidos{

    public function salvar($pedido);
    
    public function getAllPedido();
    
    public function updatePedido($pedido, $id);
    
    public function getByIdPedido($id);
    
    public function updatePedidoStatus($status, $id);
    
    public function getBystatuspedido($status);
}
?>
