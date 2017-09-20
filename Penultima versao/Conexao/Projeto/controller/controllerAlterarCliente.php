<?php

require_once '../dto/clienteDTO.php';
require_once '../dao/clienteDAO.php';

$idcliente = $_POST['idcliente'];
$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$idcidade = $_POST['cidade'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];


$clienteDTO = new clienteDTO();
$clienteDTO->setIdcliente($idcliente);
$clienteDTO->setNome($nome);
$clienteDTO->setRg($rg);
$clienteDTO->setCpf($cpf);
$clienteDTO->setTelefone($telefone);
$clienteDTO->setIdcidade($idcidade);
$clienteDTO->setCep($cep);
$clienteDTO->setEndereco($endereco);
$clienteDTO->setEmail($email);


$clienteDAO = new clienteDAO();
$ok = $clienteDAO= $clienteDAO->updatecliente($clienteDTO);

if ($ok){
    $msg = "Alterado com sucesso!";
}else{
    $msg = "Erro ao Alterar!";
}

?>
<script>
    window.location="../view/formListarCliente.php?msg=<?php echo $msg ?>";
</script>

