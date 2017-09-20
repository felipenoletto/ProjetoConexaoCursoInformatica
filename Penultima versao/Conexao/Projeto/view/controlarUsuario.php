<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('Location: login.php');
    exit;
}
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >
        <link rel="stylesheet" href="../css/access.css" type="text/css" media="screen">
    </head>
    <body>
        <table align="center" valign="center">
            <tr>
                <td class="user" align="center" bgcolor="#800"><font color="#FFF"><a href="formCadastrarUser.php" target="centro">Cadastrar Usuario</a></font></td>
                <td class="user" align="center" bgcolor="#800"><font color="#FFF"><a href="formListarUsuario.php">Listar Usuarios</a></font></td>
            </tr>
        </table>
    </body>
</html>