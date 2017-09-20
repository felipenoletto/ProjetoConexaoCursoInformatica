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
        <?php
        ?>
        <table width="95%" align="center">
            <tr>
                <td>

                    <table width="895"  border="0">
                        <tr>
                            <td align="left" colspan="2">Pesquisar Pedido:<br>
                            <form action="" method="post"><input type="text" name="idpedidos"/>
                            <input type="image" src="../imagens/icones/pesquisar30.png"/></form>
                            </td>
                            <td colspan="6"></td>
                            
                        </tr>


                        <?php
                        require_once '../dao/vendasDAO.php';
                        require_once '../dao/clienteDAO.php';
                        require_once '../dao/pedidosDAO.php';
                        include '../js/funcao.php';
                        $vendasDAO = new vendasDAO();
                        $clienteDAO = new clienteDAO();
                        $pedidoDAO = new pedidoDAO();
                            
                        if (isset($_POST['idpedidos'])) {
                          ?>
                        <tr>
                            <td align="center" bgcolor="#800"><font color="#FFF">Cliente</font> </td> 
                            <td align="center" bgcolor="#800"><font color="#FFF">Valor do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Data do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Descrição do Pedido</font> </td>
                        </tr>
                          <?php
                            $idpedidos = $_POST["idpedidos"];
                            $pedidobyid= $pedidoDAO->getByIdPedido($idpedidos);
                            $nomeCliente = $clienteDAO->getNomeByidCliente($pedidobyid['idcliente']);
                                echo "<tr>";
                                echo "  <td align='center' bgcolor='#eed6d6'>{$nomeCliente}</td>";
                                echo "  <td align='center' bgcolor='#eed6d6'>{$pedidobyid['valor_pedido']}</td>";
                                echo "  <td align='center' bgcolor='#eed6d6'>",databr($pedidobyid['data_pedido']),"</td>";
                                echo "  <td align='center' bgcolor='#eed6d6'>{$pedidobyid['desc_pedido']}</td>";
                                echo "</tr>";
                        } else {
                            ?>
                         <tr>
                            <!--<td>Cadastrado</td> -->
                            <td align="center" bgcolor="#800"><font color="#FFF">Código do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Valor do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Forma de Pagamento</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Valor Total</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Data do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Data da Venda</font> </td>
                            
                        </tr>
                        <?php
                            $vendas = $vendasDAO->getAllvendas();
                        
                         
                        foreach ($vendas as $f) {
                            
                            echo "<tr>";
                            //echo "  <td>{$f['data_cadastro']}</td>";
                            echo "  <td>{$f['idpedidos']}</td>";
                            echo "  <td>{$f['valor_pedido']}</td>";
                            echo "  <td>{$f['forma_pagamento']}</td>";
                            echo "  <td>{$f['valor_total']}</td>";
                            echo "  <td>",databr($f['data_pedido']),"</td>";
                            echo "  <td>",databr($f['data_venda']),"</td>";
                            
                            
                            
                        
                            echo "</tr>";
                        }
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
