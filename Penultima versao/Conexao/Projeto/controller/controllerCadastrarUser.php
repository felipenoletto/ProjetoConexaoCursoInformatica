<?php
require_once '../dto/usuarioDTO.php';
require_once '../dao/usuarioDAO.php';

$nome= $_POST['nome'];
$senha= $_POST['senha'];
$perfil= $_POST['perfil'];
$status= $_POST['status'];

$usuario = new usuarioDTO();
$usuario->setNome($nome);
$usuario->setSenha($senha);
$usuario->setPerfil($perfil);
$usuario->setStatus($status);

$usuarioDAO = new usuarioDAO();
$ok = $usuarioDAO->salvar($usuario);

if ($ok){
    $msg = "Cadastrado com Sucesso!  ";

}else{
    $msg = "Erro ao cadastrar!  ";

}

?>
<script>
    window.location="../view/formCadastrarUser.php?msg=<?php echo $msg,$img?>";
</script>