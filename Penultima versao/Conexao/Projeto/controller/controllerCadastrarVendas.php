<?php
require_once '../dto/vendasDTO.php';
require_once '../dao/vendasDAO.php';
include '../js/funcao.php';

$idcliente=$_POST['idcliente'];
$idpedidos=$_POST['idpedidos'];
$valor_pedido=$_POST['valor_pedido'];
$forma_pagamento=$_POST['forma_pagamento'];
$valor_total=$_POST['valor_total'];
$data_pedido=$_POST['data_pedido'];
$data_venda =dataEUA(date("d/m/Y"));
$status=$_POST['status'];


$vendas = new vendasDTO();

$vendas->setIdcliente($idcliente);
$vendas->setIdPedidos($idpedidos);
$vendas->setValor_pedido($valor_pedido);
$vendas->setForma_pagamento($forma_pagamento);
$vendas->setValor_Total($valor_total);
$vendas->setData_pedido($data_pedido);
$vendas->setData_venda($data_venda);
$vendas->setStatus($status);

$vendasDAO = new vendasDAO();
$ok = $vendasDAO->salvar($vendas);

if($ok){
$estado='fechado';
$fecharPedido = new vendasDAO();
$fecharPedido->updateEstadoPedido($idpedidos,$estado);
}

?>

<script>
  document.location.href='controllerLivroCaixa.php?idpedido=<?php echo "$idpedidos";?>&valortotal= <?php echo "$valor_total"; ?>&idcliente=<?php echo "$idcliente"; ?>'
</script>
