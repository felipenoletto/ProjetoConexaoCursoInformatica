<?php
require_once '../dto/clienteDTO.php';
require_once '../dao/clienteDAO.php';

$nome=$_POST['nome'];
$rg=$_POST['rg'];
$cpf=$_POST['cpf'];
$telefone=$_POST['telefone'];
$idcidade=$_POST['idcidade'];
$cep=$_POST['cep'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];
$status=$_POST['status'];

$cliente = new clienteDTO();
$cliente->setNome($nome);
$cliente->setRg($rg);
$cliente->setCpf($cpf);
$cliente->setTelefone($telefone);
$cliente->setIdcidade($idcidade);
$cliente->setCep($cep);
$cliente->setEndereco($endereco);
$cliente->setEmail($email);
$cliente->setStatus($status);

$clienteDAO = new clienteDAO();
$ok = $clienteDAO->salvar($cliente);

if ($ok){
    $msg = "Cadastrado com Sucesso!  ";
    $img = "<img src='../imagens/icones/Sucesso.jpg'/>";
}else{
    $msg = "Erro ao cadastrar!  ";
    $img = "<img src='../imagens/icones/Erro.jpg'/>";
}

?>

<script>
    window.location="../view/formCadastrar.php?msg=<?php echo $msg,$img?>";
</script>