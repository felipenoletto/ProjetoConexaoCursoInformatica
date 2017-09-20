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
                        
                            <legend>Cadastrar Pedido</legend>
                            <form method="post" action="../controller/controllerCadastrarUser.php">
                            <table>
                                <tr>
                                    <td align="right">Valor Pedido:</td>
                                    <td><input type="text" name="valorpedido"/></td>
                                </tr>                                  
                                <tr>
                                    <td align="right">Data Pedido:</td>
                                    <td><input type="text" name="datapedido"/></td>
                                </tr> 
                                <tr>
                                    <td align="right">Status:</td>
                                    <td><select name="status">
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
