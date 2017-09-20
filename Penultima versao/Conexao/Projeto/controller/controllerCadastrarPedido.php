<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('Location: login.php');
    exit;
}

require_once'../dto/pedidosDTO.php';
require_once '../dao/pedidosDAO.php';
include '../js/funcao.php';



$dataPedido =dataEUA(date("d/m/Y"));
$idcliente=$_POST['idcliente'];
$valorPedido=$_POST['valorpedido'];
$descPedido=$_POST['descpedido'];
$status=$_POST['statuspedido'];
$estado = 'aberto';





$pedido = new pedidosDTO();
$pedido->setDataPedido($dataPedido);
$pedido->setIdCliente($idcliente);
$pedido->setValorPedido($valorPedido);
$pedido->setDescPedido($descPedido);
$pedido->setStatus($status);
$pedido->setEstado($estado);


$pedidoDAO = new pedidoDAO();
$ok = $pedidoDAO->salvar($pedido);

if($ok){
    $msg= "Pedido Cadastrado com Sucesso";
}else{
    $msg= "Erro ao Cadastrar Pedido";
}
?>
<script>
window.location="../view/formListarPedidos.php"
</script>
