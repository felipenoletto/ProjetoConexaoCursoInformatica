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
                            <td align="left" colspan="2">Pesquisar:<br>
                                <form action="" method="post"><input type="text" name="pnome"/>
                                    <input type="image" src="../imagens/icones/pesquisar30.png"/></form>
                            </td>
                            <td align="right" colspan="3">Mostrar:</td>                                
                            <td align="right" colspan="2"><form action="" method="post"><select name="pstatus">
                                        <option value="">Todos</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select><input type="image" src="../imagens/icones/pesquisar30.png"/></form>
                            </td>

                        </tr>

                        <tr>
                            <!--<td>Cadastrado</td> -->
                            <td align="center" bgcolor="#800"><font color="#FFF">Nome</font> </td> 
                            <td align="center" bgcolor="#800"><font color="#FFF">RG</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">CPF</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Telefone</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Endereço</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Status</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Alterar</font> </td>  
                        </tr>


                        <?php
                        require_once '../dao/clienteDAO.php';
                        $clienteDAO = new clienteDAO();

                        if (isset($_POST['pnome'])) {
                            $pnome = $_POST["pnome"];
                            $cliente = $clienteDAO->getBynomecliente($pnome);
                        } else if (isset($_POST['pstatus'])) {
                            $pstatus = $_POST["pstatus"];
                            $cliente = $clienteDAO->getBystatuscliente($pstatus);
                        } else {
                            $cliente = $clienteDAO->getAllcliente();
                        }
                        $x = 0;
                        foreach ($cliente as $f) {
                            $x = $x + 1;
                            if ($x % 2 == 0) {

                                echo "<tr>";
                                //echo "  <td>{$f['data_cadastro']}</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['nome']}</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['rg']}</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['cpf']}</td>";
                                echo "  <td  bgcolor='#eed6d6'>{$f['telefone']}</td>";
                                echo "  <td  bgcolor='#eed6d6'><font>{$f['endereco']} | Cep:{$f['cep']} | ", utf8_encode($f['cidade']), " - {$f['uf']}</font></td>";


                            } else {

                                echo "<tr color='white'>";
                                //echo "  <td>{$f['data_cadastro']}</td>";
                                echo "  <td>{$f['nome']}</td>";
                                echo "  <td>{$f['rg']}</td>";
                                echo "  <td>{$f['cpf']}</td>";
                                echo "  <td>{$f['telefone']}</td>";
                                echo "  <td><font>{$f['endereco']} | Cep:{$f['cep']} | ", utf8_encode($f['cidade']), " - {$f['uf']}</font></td>";
                            }
                            if (($f['status']) == 'ativo') {
                                echo "  <td><font color='green'><center><a href='../controller/controllerAlterarStatusCliente.php?idcliente={$f["idcliente"]}&status={$f['status']}'><img src='../imagens/icones/ativo30.2.png' title='ATIVAR' align='center'></a></font</td>";
                            } else if (($f['status']) == 'inativo') {
                                echo "  <td><font color='red'><center><a href='../controller/controllerAlterarStatusCliente.php?idcliente={$f["idcliente"]}&status={$f['status']}'><img src='../imagens/icones/inativo30.2.png' title='INATIVAR' align='center'></a></font></td>";
                            }

                            echo "  <td><center><a href='formAlterarcliente.php?idcliente={$f["idcliente"]}'><img src='../imagens/icones/alterar30.2.png' title='ALTERAR'></a></center></td>";
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
