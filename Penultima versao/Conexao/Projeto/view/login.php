<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<link rel="stylesheet" href="../css/logincss.css" type="text/css" media="screen"/>
    </head>
    <body>
	<div id="painel">
        <div id="centro">
            <form action="../controller/controllerValidarLogin.php" method="post">  
            <table id="tabela" width="300" height="60">
                 
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                    
                    <tr>
                        <td align="right"><font Color="#800">USU&Aacute;RIO:</font></td>
                        <td><font color="#800"><input type="text" name="user" id="input"/></font></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="#800">SENHA</font></td>
                        <td><input type="password" name="senha" id="input"/></td>
                    </tr>
					<tr>
					<td colspan="3"><center><input type="image" src="../imagens/icones/login10.png"/></center></td>
					</tr>
                   <?php
                            if (!empty($_REQUEST['msg'])) {
                            echo "<span class='erroLogin'>{$_REQUEST['msg']}</span>";
                            }
                   ?> 
            </table>
            </form>
        </div>
		</div>
    </body>
</html>