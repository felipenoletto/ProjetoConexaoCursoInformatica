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
    </head>
    <body>
        <?php
        require_once '../dao/pedidosDAO.php';
        require_once '../dao/clienteDAO.php';

        $idpedidos = $_GET['idpedidos'];
        $pedidoDAO = new pedidoDAO();
        $pedido = $pedidoDAO->getByIdPedido($idpedidos);
        $clienteDAO= new clienteDAO();
        $nomeCliente = $clienteDAO->getNomeByidCliente($pedido['idcliente']);
        $clientes = $clienteDAO->getAllcliente();
        ?>

        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>Alterar pedido</legend>
                        <form name="form1" action="../controller/controllerAlterarPedido.php" method="post">
                            <table>

                                <input type="hidden" name="idpedidos" value="<?php echo $pedido['idpedidos'] ?>"/>
                                <tr>
                                    <td>Cliente:</td>
                                    <td><select name="idcliente">
                                            <option value="<?php echo $pedido['idcliente'] ?>" selected><?php echo $nomeCliente ?></option>
                                            <?php 
                                            foreach($clientes as $f){
                                                echo "<option value='{$f['idcliente']}'>{$f['nome']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>        
                                </tr>
                                <tr>
                                    <td>Descrição Pedido:</td>
                                    <td><input type="text" name="descpedido" id="cpf" value="<?php echo $pedido['desc_pedido'] ?>"/></td>
                                </tr>                            
                                <tr>
                                    <td>Valor Pedido:</td>
                                    <td><input type="text" name="valorpedido" id="rg" class="textfield" value="<?php echo $pedido['valor_pedido'] ?>"/></td>
                                </tr>

                                <tr>
                                    <td colspan="2"><input type="submit" value="Alterar" class="submit"/></td>                                    
                                </tr>                                                            

                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
        </table>
    </body>
</html>

