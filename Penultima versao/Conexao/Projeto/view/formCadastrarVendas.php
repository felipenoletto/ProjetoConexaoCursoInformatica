<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('Location: login.php');
    exit;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-1.8.2.js"></script>        
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript">
        </script>
    </head>
    <body>
        <?php
        require_once '../dao/vendasDAO.php';
        require_once '../dao/clienteDAO.php';
        
        $idpedido=$_GET['idpedidos'];
        $valorpedido=$_GET['valorpedido'];
        $datapedido=$_GET['datapedido'];
        $idcliente =$_GET['idcliente'];
 
        ?>
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>Cadastrar Vendas</legend>
                        <table>
                            <form method="post" action="../controller/controllerCadastrarVendas.php">
                            <input type="hidden" name="idpedidos" value="<?php echo $idpedido ?>"/>
                            <input type="hidden" name="idcliente" value="<?php echo $idcliente ?>"/>
                               
                                <tr>
                                    <td>Valor do Pedido:</td>
                                    <td><input type="text" name="valor_pedido" value="<?php echo $valorpedido; ?>" id="valor_pedido" class="textfield"/><font color="red">*</font></td>
                                </tr>
                                <tr>
                                    <td>Forma de Pagamento:</td>
                                    <td><input type="text" name="forma_pagamento" id="forma_pagamento"/></td>
                                </tr>
         
                                <tr>
                                    <td>Valor Total:</td>
                                    <td><input type="text" name="valor_total" id="valor_total"/><font color="red">*</font></td></td>
                                                                  
                                    
                                </tr>
                                <td>Data do Pedido:</td>
                                    <td><input type="text" name="data_pedido" value="<?php echo $datapedido; ?>" id="data_pedido"/><font color="red">*</font></td>
                                                                  
                                    
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        <select name="status">
                                            <option value="">::Selecione::</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><input type="submit" value="cadastrar"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><font color="red">(*) = Campos Obrigatórios</font></td>
                                </tr>
                                <?php
                                if (!empty($_REQUEST['msg'])) {
                                echo "<tr>
                                        <td align='center' colspan='2'>";
                                            echo $_REQUEST['msg'];
                                        "</td>";
                                        } else {
                                            echo "&nbsp;";
                                        }
                                        

                                "</tr>"
                                ?>

                        </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>


        <script type="text/javascript">
  
                
                $("#formCadastrar").validate({
                    // Define as regras
                    rules:{
                        campoIdvendas:{
                            // campoIdvendas será obrigatório (required) e terá tamanho mínimo (minLength)
                            required: true, minlength: 2
                        }
                    },
                    // Define as mensagens de erro para cada regra
                    messages:{
                        campoNome:{
                            required: "Digite o código de venda"
      
                        }
                    }
                });
                
          
        </script>
        <script type="text/javascript">

$(document).ready(function() {
	$("form").validate({
		rules: {
		nome:{required: true},
		endereco: {required: true},
		valor:{required: true},
		data: {required: true, dateBR: true},
		cpf: {required: true, cpf: true},
		cnpj:{required: true,cnpj:true},
		telefone: { required: true}
      },		
		messages: {
		
			
			valor:{required:'preencha o campo de valor'},    
			data: {required: ' A data de nascimento deve ser preenchida corretamente',dateBR:'informe uma data válida'}
			
                        
		}
		
		
	});
	
});


</script>


    </body>
</html>
