<?php

require_once '../dto/pedidosDTO.php';
require_once '../dao/pedidosDAO.php';

$idpedidos = $_POST['idpedidos'];
$idcliente = $_POST['idcliente'];
$valorPedido = $_POST['valorpedido'];
$descPedido = $_POST['descpedido'];




$pedidoDTO = new pedidosDTO();
$pedidoDTO->setIdpedido($idpedidos);
$pedidoDTO->setIdCliente($idcliente);
$pedidoDTO->setValorPedido($valorPedido);
$pedidoDTO->setDescPedido($descPedido);


$pedidoDAO = new pedidoDAO();
$ok = $pedidoDAO->updatepedido($pedidoDTO, $idpedidos);

if ($ok){
    $msg = "Alterado com sucesso!";
}else{
    $msg = "Erro ao Alterar!";
}   

?>
<script>
window.location="../view/formListarPedidos.php"
</script>

