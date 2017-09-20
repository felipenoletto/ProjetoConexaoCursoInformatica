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
                            <td colspan="6"></td>
                            
                        </tr>

                        <tr>
                            <!--<td>Cadastrado</td> -->
                            <td align="center" bgcolor="#800"><font color="#FFF">Nome</font> </td> 
                            <td align="center" bgcolor="#800"><font color="#FFF">Perfil</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Status</font> </td>
                            <td align="center" bgcolor="#800"><font color="#FFF">Alterar</font> </td>
                            
                        </tr>


                        <?php
                        require_once '../dao/usuarioDAO.php';
                        $usuarioDAO = new usuarioDAO();
                        $usuario = $usuarioDAO->getAllUsuario();
                        
                        /*if (isset($_POST['pnome'])) {
                            $pnome = $_POST["pnome"];
                            $cliente = $clienteDAO->getBynomecliente($pnome);
                        } else {

                            $cliente = $clienteDAO->getAllcliente();
                        }*/
                        
                        foreach ($usuario as $f) {
                            
                            echo "<tr>";
                            //echo "  <td>{$f['data_cadastro']}</td>";
                            echo "  <td>{$f['nome']}</td>";
                            echo "  <td>{$f['perfil']}</td>";
                            
                            if(($f['status'])=='ativo'){
                            echo "  <td><font color='green'><center><a href='../controller/controllerAlterarStatusUsuario.php?idusuario={$f["idusuario"]}&status={$f['status']}'><img src='../imagens/icones/ativo30.2.png' title='ATIVAR' align='center'></a></font</td>";
                            }else if(($f['status'])=='inativo'){
                            echo "  <td><font color='red'><center><a href='../controller/controllerAlterarStatusUsuario.php?idusuario={$f["idusuario"]}&status={$f['status']}'><img src='../imagens/icones/inativo30.2.png' title='INATIVAR' align='center'></a></font></td>";
                            }
                            
                            echo "  <td><center><a href='formAlterarUsuario.php?idusuario={$f["idusuario"]}'><img src='../imagens/icones/alterar30.2.png' title='ALTERAR'></a></center></td>";
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

