<?php
require_once '../dao/clienteDAO.php';

$id = $_GET['idcliente'];

$clienteDAO = new clienteDAO();
$ok = $clienteDAO->deleteByIdcliente($id);

if ($ok){
    $msg = "Excluido com sucesso";
}else{
    $msg = "Erro ao Excluir";
}


?>
<script>
    window.location="../view/FormListarCliente.php?msg=<?php echo $msg ?>";
</script>