<?php

require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';

$idusuario = $_GET['idusuario'];
$status =   $_GET['status'];

if ($status == 'ativo') {
    $newStatus = 'inativo';
} else {
    $newStatus = 'ativo';
}

$usuarioDAO = new usuarioDAO();
$ok = $usuarioDAO->updateUsuarioStatus($newStatus, $idusuario);

if ($ok){
    $msg = "Status atualizado com sucesso";
}else{
    $msg = "Erro ao atualizar Status";
}

?>
<script>
    window.location="../view/FormListarUsuario.php?msg=<?php echo $msg ?>";
</script>