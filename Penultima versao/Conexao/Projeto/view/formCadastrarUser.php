<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>  
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <form method="post" action="../controller/controllerCadastrarUser.php">
                            <legend>Cadastrar Usuário</legend>
                            <table>
                                <tr>
                                    <td align="right">Nome:</td>
                                    <td><input type="text" name="nome"/></td>
                                </tr>                                  
                                <tr>
                                    <td align="right">Senha:</td>
                                    <td><input type="password" name="senha"/></td>
                                </tr> 
                                <tr>
                                    <td align="right">Perfil:</td>
                                    <td>
                                        <select name="perfil">
                                            <option>::Selecione::</option>
                                            <option>Administrador</option>
                                            <option>Usuario</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status">
                                            <option value="">::Selecione::</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                    </td>
                                </tr>	
                                <tr>
                                    <td align="center" colspan="2"><input type="submit" value="Cadastrar"/></td>
                                </tr>
                                                                <?php
                                if (!empty($_REQUEST['msg'])) {
                                echo "<tr>
                                        <td align='center' colspan='2'>";
                                            echo $_REQUEST['msg'];
                                        "</td>";
                                        } else {
                                            echo "&nbsp;";
                                        }
                                        

                                "</tr>"
                                ?>
                        </form>
        </table>
    </form>
</fieldset>                    
</td>
</tr>
</table>
</body>
</html>