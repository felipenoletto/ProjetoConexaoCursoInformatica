<?php
require_once '../dao/livroCaixaDAO.php';
require_once '../dto/livroCaixaDTO.php';

$id_pedido = $_GET['idpedido'];
$valor_total_venda = $_GET['valortotal'];
$id_Cliente = $_GET['idcliente'];


$livroCaixa = new livroCaixaDTO();
$livroCaixa->setId_Cliente($id_Cliente);
$livroCaixa->setValor_total_venda($valor_total_venda);

$livrocaixaDAO = new livroCaixaDAO();
$livrocaixaDAO->salvar($livroCaixa);

?>
