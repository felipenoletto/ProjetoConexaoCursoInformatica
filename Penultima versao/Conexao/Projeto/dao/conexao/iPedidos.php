<?php
interface iPedidos{

    public function salvar($pedido);
    
    public function getAllPedido();
    
    public function updateUsuarioPedido($pedido, $id);
    
}
?>
