<?php

require_once '../dto/pedidosDTO.php';
require_once '../dao/pedidosDAO.php';

$idpedido = $_GET['idpedidos'];
if (($status = $_GET['status'])=='ativo') {

    $newStatus = 'inativo';
} else {
    $newStatus = 'ativo';
}

$pedidosDAO = new pedidoDAO();
$ok = $pedidosDAO->updatePedidoStatus($newStatus, $idpedido);

if ($ok){
    $msg = "Status atualizado com sucesso";
}else{
    $msg = "Erro ao atualizar Status";
}

?>
<script>
    window.location="../view/FormListarPedidos.php?msg=<?php echo $msg ?>";
</script>
