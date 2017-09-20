<?php

require_once '../dto/clienteDTO.php';
require_once '../dao/clienteDAO.php';

$idcliente = $_GET['idcliente'];
if (($status = $_GET['status'])=='ativo') {

    $newStatus = 'inativo';
} else {
    $newStatus = 'ativo';
}

$clienteDAO = new clienteDAO();
$ok = $clienteDAO->updateClienteStatus($newStatus, $idcliente);

if ($ok){
    $msg = "Status atualizado com sucesso";
}else{
    $msg = "Erro ao atualizar Status";
}

?>
<script>
    window.location="../view/FormListarCliente.php?msg=<?php echo $msg ?>";
</script>
