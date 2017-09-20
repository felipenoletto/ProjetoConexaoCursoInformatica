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
        <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
        <script type="text/javascript">
                   
            jQuery(function($){
                $("#cpf").mask("999.999.999-99");
                $("#cep").mask("99.999-999");
                $("#telefone").mask("(99) 9999-9999");
            });
            

        </script>
    </head>
    <body>
        <?php
        require_once '../dao/clienteDAO.php';

        $clienteDAO = new clienteDAO();
        $estados = $clienteDAO->getAllEstados();
        ?>
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>Cadastrar Cliente</legend>
                        <table>
                            <form method="post" action="../controller/controllerCadastrarCliente.php">
                                
                            
                                <tr>
                                    <td>Nome:</td>
                                    <td><input type="text" name="nome"/><font color="red">*</font></td>
                                </tr>
                                <tr>
                                    <td>RG:</td>
                                    <td><input type="text" name="rg" id="rg"/></td>
                                </tr>
                                <tr>
                                    <td>CPF:</td>
                                    <td><input type="text" name="cpf" id="cpf" class="textfield"/><font color="red">*</font></td>
                                </tr>
                                <tr>
                                    <td>Telefone:</td>
                                    <td><input type="text" name="telefone" id="telefone"/></td>
                                </tr>
                                <tr>
                                    <td><label>Estado:</label></td>
                                    <td>
                                        <?php
                                        echo "<select name='estado' id='estado'>";
                                        echo "<option value='0'>Selecione o Estado</option>";
                                        foreach ($estados as $estado) {
                                            echo "<option value='{$estado["idestado"]}'>", utf8_encode($estado['nome']), " </option>";
                                        }
                                        echo "</select>";
                                        ?>                                    
                                    <font color="red"></font></td>
                                </tr>
                                <tr>
                                    <td><label>Cidade:</label></td>
                                    <td>
                                        <select name="idcidade" id="cidade">
                                            <option selected>Selecione o Estado</option>
                                        </select>
                                    <font color="red"></font></td>
                                </tr>
                                <tr>
                                    <td>CEP:</td>
                                    <td><input type="text" name="cep" id="cep"/><font color="red">*</font></td>
                                </tr>
                                <tr>
                                    <td>Endereço:</td>
                                    <td><input type="text" name="endereco"/></td>
                                </tr>                
                                <tr>
                                    <td>E-mail:</td>
                                    <td><input type="text" name="email"</td>
                                </tr>
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
            $(document).ready(function(){
                $('#estado').change(function(){
                    $('#cidade').load('listaCidades.php?estado='+$('#estado').val());
                });
                
                $("#formCadastrar").validate({
                    // Define as regras
                    rules:{
                        campoNome:{
                            // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                            required: true, minlength: 2
                        }
                    },
                    // Define as mensagens de erro para cada regra
                    messages:{
                        campoNome:{
                            required: "Digite o seu nome",
                            minLength: "O seu nome deve conter, no mínimo, 2 caracteres"
                        }
                    }
                });
                
            });
            $("form").validate({
		rules: {



		cpf: {required: true, cpf: true},
                nome: {required: true},
                cep: {required: true}
      },	
		messages: {
		
                        nome: {required: 'Campo Obrigatorio'},
			cpf: {required: 'Campo Obrigatorio', cpf: 'Informe um cpf válido'},
                        cep: {required: 'Campo Obrigatorio'}
                        
		}
		
		
	});
	
;
        </script>



    </body>
</html>
