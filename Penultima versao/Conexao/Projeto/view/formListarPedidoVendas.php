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
    </head>
    <body>

        <table width="95%" align="center">
            <tr>
                <td>

                    <table width="895"  border="0">
                        <tr>
                            <td align="left" colspan="2">Pesquisar:<br>
                            <form action="" method="post"><input type="text" name="pnome"/>
                            <input type="image" src="../imagens/icones/pesquisar30.png"/></form>
                            </td>
                            <td colspan="6"></td>
                            
                        </tr>

                        <tr>
                            <!--<td>Cadastrado</td> -->
                            <td align="center" bgcolor="#800"><font color="#FFF">Cliente</font> </td> 
                            <td align="center" bgcolor="#800"><font color="#FFF">Valor do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Data do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Descrição do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Fechar Pedido</font> </td>  
                        </tr>


                        <?php
                        require_once '../dao/pedidosDAO.php';
                        include '../js/funcao.php';
                        require_once '../dao/clienteDAO.php';
                        $clienteDAO = new clienteDAO();
                        $pedidoDAO = new pedidoDAO();
                            
                        /*if (isset($_POST['pnome'])) {
                            $pnome = $_POST["pnome"];
                            $cliente = $clienteDAO->getBynomecliente($pnome);
                        } else {

                            $cliente = $clienteDAO->getAllcliente();
                        }*/
                        $pedido = $pedidoDAO->getAllPedido();
                        foreach ($pedido as $f) {
                           
                            echo "<tr>";
                            //echo "  <td>{$f['data_cadastro']}</td>";
                            //echo "  <td>{$f['idusuario']}</td>";
                            $nomeCliente = $clienteDAO->getNomeByidCliente($f['idcliente']);
                            echo "  <td>$nomeCliente</td>";
                            echo "  <td>R$ {$f['valor_pedido']}</td>";
                            echo "  <td>",databr($f['data_pedido']),"</td>";
                            echo "  <td>{$f['desc_pedido']}</td>";
                            
                            echo "  <td><center><a href='formCadastrarVendas.php?idpedidos={$f["idpedidos"]}&valorpedido={$f['valor_pedido']}&datapedido={$f['data_pedido']}&idcliente={$f['idcliente']}']'><img src='../imagens/icones/sucesso30.png' title='ALTERAR'></a></center></td>";
                            echo "</tr>";
                        }
                        ?>
                        <tr>

                            <td align="center" colspan="7">
                                <?php
                                if (!empty($_REQUEST['msg'])) {
                                    echo $_REQUEST['msg'];
                                } else {
                                    echo "&nbsp;";
                                }
                                ?>

                    </table>

                </td>
            </tr>


        </table>
    </body>
</html>