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
        require_once '../dao/usuarioDAO.php';
        
        $idusuario = $_GET['idusuario'];
        $usuarioDAO = new usuarioDAO();
        $usuario = $usuarioDAO->getByIdUsuario($idusuario);
        ?>

        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>Alterar Usuario</legend>
                        <form name="form1" action="../controller/controllerAlterarPedido.php" method="post">
                            <table>

                                <input type="hidden" name="idusuario" value="<?php echo $usuario['idusuario'] ?>"/>
                                <tr>
                                    <td>Cliente:</td>
                                    <td><input type="text" name="nome" value="<?php echo $usuario['nome'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Nova Senha:</td>
                                    <td><input type="password" name="senha"/></td>
                                </tr>                            
                                <tr>
                                    <td>Perfil:</td>
                                    <td><select name="perfil">
                                            <option value="<?php echo $usuario['perfil']?>" select><?php echo $usuario['perfil']?></option>
                                            <option value="usuario"></option>
                                        </select>
                                    </td>
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