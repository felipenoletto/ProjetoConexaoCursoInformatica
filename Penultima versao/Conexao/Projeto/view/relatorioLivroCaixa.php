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
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/jquery-1.8.2.js"></script>    
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript">
                   
            jQuery(function($){
                $(".data").mask("9999-99-99");

                
            });
            

        </script>
        <title></title>
    </head>
    <body>

        <table width="95%" align="center">
            <tr>
                <td>

                    <table width="895"  border="0">
                        <tr>
                            <td align="left" colspan="2">Relatorio:<br>
                                <form action="" method="post">
                                    <select name="tiporelatorio">
                                        <option value="">::Selecione::</option>
                                        <option value="completo">Completo</option>
                                        <option value="entredata">Apartir de, até</option>
                                        <option value="data">Data</option>
                                    </select>
                                    <input type="submit" value="OK"/>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $tiporelatorio = $_POST['tiporelatorio'];
                        if ($tiporelatorio == 'completo') {
                            require_once '../dao/livroCaixaDAO.php';
                            require_once '../dao/clienteDAO.php';
                            $clienteDAO = new clienteDAO();
                            
                            $livroCaixaDAO = new livroCaixaDAO();
                            $relatorio = $livroCaixaDAO->getAllLivroCaixa();
                            echo "<tr>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Id Venda</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Cliente</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Valor Tota da venda</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Descrição da Saida</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Valor da Saida</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Data da Saida</font> </td>";
                            echo "</tr>";
                            foreach ($relatorio as $f) {
                                echo "<tr>";
                                echo "  <td>{$f['idVendas']}</td>";
                                echo "  <td>{$f['idCliente']}</td>";
                                echo "  <td>{$f['Valor_total_venda']}</td>";
                                echo "  <td>{$f['Descricao_saida']}</td>";
                                echo "  <td>{$f['Valor_saida']}</td>";
                                echo "  <td>{$f['Data_saida']}</td>";
                                echo "</tr>";
                            }
                        } else if ($tiporelatorio == 'entredata') {
                            echo "<form action='' method='post'>";
                            echo "<tr>";
                            echo "<td>De:<br><input type='text' class='data' name='datainicio'/></td>";
                            echo "<td align='left'>Ate:<br><input type='text' class='data' name='datafinal'/></td>";
                            echo "<td><input type='submit' value='ok'/></td>";
                            echo "</tr>";
                            echo "</form>";
            
                            if (isset($_POST['datainicio'])and isset($_POST['datafinal'])){
                            
                            $datainicio = $_POST['datainicio'];
                            $datafinal = $_POST['datafinal'];
                            
                            require_once '../dao/livroCaixaDAO.php';
                            $livroCaixaDAO = new livroCaixaDAO();
                            $relatorio = $livroCaixaDAO->getByData($datainicio, $datafinal);
                            echo "<tr>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Cliente</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Valor do Pedido</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Data do Pedido</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Descrição do Pedido</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Status</font> </td>";
                            echo "<td align='center' bgcolor='#800'><font color='#FFF'>Alterar</font> </td>";
                            echo "</tr>";
                            foreach ($relatorio as $f) {
                                $nomeCliente = $clienteDAO->getNomeByidCliente($f['idCliente']);
                                echo "<tr>";
                                echo "  <td>{$f['idVendas']}</td>";
                                echo "  <td>{$nomeCliente}</td>";
                                echo "  <td>{$f['Valor_total_venda']}</td>";
                                echo "  <td>{$f['Descricao_saida']}</td>";
                                echo "  <td>{$f['Valor_saida']}</td>";
                                echo "  <td>{$f['Data_saida']}</td>";
                                echo "</tr>";
                            }
                            }else{
                                
                            }
                            
                        }
                        
                            ?>

                    </table>


                </td>
            </tr>


        </table>
    </body>
</html>