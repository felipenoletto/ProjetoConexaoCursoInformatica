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
            jQuery(function($){
                $("#cpf").mask("999.999.999-99");
                $("#cep").mask("99.999-99");
                $("#telefone").mask("(99) 9999-9999");
            });
        </script>
    </head>
    <body>
        <?php
        require_once '../dao/clienteDAO.php';

        $idcliente = $_GET['idcliente'];
        $clienteDAO = new clienteDAO();
        $estados = $clienteDAO->getAllEstados();
        $cliente = $clienteDAO->getByIdcliente($idcliente);
        $idcidade = $cliente['idcidade'];
        $idestado = $cliente['idestado'];
        $cidades = $clienteDAO->getAllCidadesByIdEstado($idestado);
        ?>

        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>Alterar Cliente</legend>
                        <table>
                            <form name="form1" action="../controller/controllerAlterarCliente.php" method="post">
                                <input type="hidden" name="idcliente" value="<?php echo $cliente['idcliente'] ?>"/>
                                <tr>
                                    <td>Nome:</td>
                                    <td><input type="text" name="nome" value="<?php echo $cliente['nome'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Rg:</td>
                                    <td><input type="text" name="rg" id="rg" class="textfield" value="<?php echo $cliente['rg'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Cpf:</td>
                                    <td><input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Telefone:</td>
                                    <td><input type="text" name="telefone" id="telefone" value="<?php echo $cliente['telefone'] ?>"/></td>
                                </tr>                            
                                <tr>
                                    <td><label>Estado:</label></td>
                                    <td>
                                        <?php
                                        echo "<select name='estado' id='estado'>";
                                        echo "<option value='0'>::Selecione::</option>";
                                        foreach ($estados as $estado) {
                                            if ($estado['idestado'] == $idestado) {
                                                echo "<option value='{$estado["idestado"]}' selected>", utf8_encode($estado['nome']), " </option>";
                                            } else {
                                                echo "<option value='{$estado["idestado"]}'>", utf8_encode($estado['nome']), " </option>";
                                            }
                                        }
                                        echo "</select>";
                                        ?>                                    
                                    </td>
                                </tr>                                                                                    
                                <tr>
                                    <td><label>Cidade:</label></td>
                                    <td>
                                        <select name="cidade" id="cidade">
                                            <?php
                                            foreach ($cidades as $cidade) {
                                                if ($cidade['idcidade'] == $idcidade) {
                                                    echo "<option value='{$cidade["idcidade"]}' selected>", utf8_encode($cidade["nome"]), "</option>";
                                                } else {
                                                    echo "<option value='{$cidade["idcidade"]}'>", utf8_encode($cidade["nome"]), "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>                                                                                                                
                                <tr>
                                    <td><label>Cep:</label></td>
                                    <td><input type="text" name="cep" id="cep" value="<?php echo $cliente['cep'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Endereço:</label></td>
                                    <td><input type="text" name="endereco" value="<?php echo $cliente['endereco'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label>Email:</label></td>
                                    <td><input type="text" name="email" value="<?php echo $cliente['email'] ?>"/></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2"><input type="submit" value="Alterar" class="submit"/></td>                                    
                                </tr>                                                            
                            </form>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#estado').change(function(){
                    $('#cidade').load('listaCidades.php?estado='+$('#estado').val());
                });
            });
        </script>

    </body>
</html>
