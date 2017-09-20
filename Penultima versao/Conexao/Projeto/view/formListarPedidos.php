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
                            <td align="left" colspan="">Mostrar:</td>                                
                            <td align="left" colspan=""><form action="" method="post"><select name="pstatus">
                                        <option value="">Todos</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select><input type="image" src="../imagens/icones/pesquisar30.png"/></form>
                            </td>
                        </tr>

                        <tr>
                            <!--<td>Cadastrado</td> -->
                            <td align="center" bgcolor="#800"><font color="#FFF">Cliente</font> </td> 
                            <td align="center" bgcolor="#800"><font color="#FFF">Valor do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Data do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Descrição do Pedido</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Status</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Alterar</font> </td>  
                        </tr>


                        <?php
                        require_once '../dao/pedidosDAO.php';
                        include '../js/funcao.php';
                        require_once '../dao/clienteDAO.php';
                        $clienteDAO = new clienteDAO();
                        $pedidoDAO = new pedidoDAO();

                        if (isset($_POST['pstatus'])) {
                          $pstatus = $_POST["pstatus"];
                          $pedido = $pedidoDAO->getBystatuspedido($pstatus);
                          } else {

                          $pedido = $pedidoDAO->getAllPedido();
                          }
                         $x= 0;
                        foreach ($pedido as $f) {
                           
                            $x = $x + 1;
                              if ($x % 2 == 0) {
                                echo "<tr>";
                                //echo "  <td>{$f['data_cadastro']}</td>";
                                //echo "  <td>{$f['idusuario']}</td>";
                                $nomeCliente = $clienteDAO->getNomeByidCliente($f['idcliente']);
                                echo "  <td  bgcolor='#eed6d6'>{$nomeCliente}</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['valor_pedido']}</td>";
                                echo "  <td  bgcolor='#eed6d6'>",databr($f['data_pedido']),"</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['desc_pedido']}</td>";
                            } else {
                                echo "<tr>";
                                $nomeCliente = $clienteDAO->getNomeByidCliente($f['idcliente']);
                                echo "  <td>{$nomeCliente}</td>";
                                echo "  <td>{$f['valor_pedido']}</td>";
                                echo "  <td>",databr($f['data_pedido']),"</td>";
                                echo "  <td>{$f['desc_pedido']}</td>";
                            }
                            if (($f['status']) == 'ativo') {
                                echo "  <td><font color='green'><center><a href='../controller/controllerAlterarStatusPedido.php?idpedidos={$f["idpedidos"]}&status={$f['status']}'><img src='../imagens/icones/ativo30.2.png' title='ATIVAR' align='center'></a></font</td>";
                            } else if (($f['status']) == 'inativo') {
                                echo "  <td><font color='red'><center><a href='../controller/controllerAlterarStatusPedido.php?idpedidos={$f["idpedidos"]}&status={$f['status']}'><img src='../imagens/icones/inativo30.2.png' title='INATIVAR' align='center'></a></font></td>";
                            }
                            
                            echo "  <td><center><a href='formAlterarPedido.php?idpedidos={$f["idpedidos"]}'><img src='../imagens/icones/alterar30.2.png' title='ALTERAR'></a></center></td>";
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
