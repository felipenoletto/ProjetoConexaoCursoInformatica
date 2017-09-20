<?php
require_once '../dto/livrocaixaDTO.php';
require_once '../dao/livrocaixaDAO.php';
include '../js/funcao.php';

$descricao_saida= $_POST['descsaida'];
$valor_saida= $_POST['valorsaida'];
$data_saida =dataEUA(date("d/m/Y"));

$livroCaixaSaida = new livroCaixaDTO();
$livroCaixaSaida->setDesc_saida($descricao_saida);
$livroCaixaSaida->setValor_saida($valor_saida);
$livroCaixaSaida->setData_saida($data_saida);

$livrocaixaDAO = new livroCaixaDAO();
$ok = $livrocaixaDAO->salvarSaida($livroCaixaSaida);
if ($ok){
    $msg = "Cadastrado com Sucesso!  ";

}else{
    $msg = "Erro ao cadastrar!  ";

}

?>
<script>
    window.location="../view/formCadastrarUser.php?msg=<?php echo $msg,$img?>";
</script>