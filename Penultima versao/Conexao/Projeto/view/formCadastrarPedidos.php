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
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script src="../js/jquery-1.8.3.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script  type="text/javascript" src="../js/jquery.maskMoney.js"></script>
        <script type="text/javascript">
                jQuery(function($){
                
                $("#valor").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
            });
        </script>    

        <?php
        require_once '../dao/clienteDAO.php';
        $clienteDAO = new clienteDAO();
        $clientes = $clienteDAO->getAllcliente();
        ?>
       <!-- <script>
            $(function() {
                var availableTags = [
                    <?php
                    /*    foreach($clientes as $f){
                      echo "'{$f['nome']}'",','; 
                      echo " <input type='hidden' name='idcliente'   value='{$f['idcliente']}' />,";
                      
                        }
                    */?>
            
                     ];
                     $( "#tags" ).autocomplete({
                         source: availableTags
                     });
                 });
        </script>-->
        <title></title>
    </head>
    <body>  
        <table align="center">
            <tr>
                <td>
                    <fieldset>

                        <legend>Cadastrar Pedido</legend>
                        <form method="post" action="../controller/controllerCadastrarPedido.php" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td align="right">Cliente:</td>
                                    <td>
                                        <select name="idcliente">
                                            <option>::Selecione::</option>
                                            <?php 
                                            foreach($clientes as $f){
                                                echo "<option value='{$f['idcliente']}'>{$f['nome']}</option>";
                                            }
                                            ?>
                                        </select>
                                        <!--<input id="tags" name="cliente"/>-->
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="right">Descrição do Pedido:</td>
                                    <td>
                                        <textarea maxlength="255" name="descpedido"></textarea>
                                    </td>
                                 </tr>
                                <tr>
                                    <td align="right" id="valor">Valor Pedido:</td>
                                    <td><input type="text" name="valorpedido"/></td>
                                </tr>                                  
                                <tr>
                                    <td align="right">Status:</td>
                                    <td><select name="statuspedido">
                                            <option value="">::Selecione::</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativar</option>
                                        </select>
                                    </td>
                                </tr><br><br>	
                                <tr>
                                    <td align="center" colspan="2"><input type="submit" value="Cadastrar"/></td>
                                </tr>  
                        </form>
        </table>
    </form>
</fieldset>                    
</td>
</tr>
</table>
</body>

</html>
