<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
    header('Location: login.php');
    exit;
}
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >  
        <title>Conexão</title> 
        <link rel="stylesheet" href="../css/access.css" type="text/css" media="screen">
    </head>
    <body background="../imagens/im.png">
        <div id="container">

            <div id="header" title="Access">
                <p><img class="imagefloat" src="../imagens/conexao 1000x290.png" alt="" width="560" height="165" border="0"></p>        
            </div><br><br><br>

            <div id="menu">
                <ul>
                    <li><font color="white">Cliente</font>
                        <ul>
                            <li><a href="formCadastrar.php" target="centro">Cadastrar</a></li>
                            <li><a href="formListarCliente.php" target="centro">Pesquisar</a></li>
                        </ul>
                    </li>
                    <li><font color="white">Pedidos</font>
                        <ul>
                            <li><a href="formCadastrarPedidos.php" target="centro">Cadastrar Pedido</a></li>
                            <li><a href="formListarPedidos.php" target="centro">Listar Pedidos</a></li>
                        </ul>
                    </li>	
                    <li><font color="white">Vendas</font>
                        <ul>
                            <li><a href="formListarPedidoVendas.php" target="centro">Cadastrar</a></li>
                            <li><a href="formListarVendas.php" target="centro">Pesquisar</a></li>
                        </ul>
                    </li>             
                    <li><font color="white">Livro Caixa</font>
                        <ul>
                            <li><a href="formCadastrarSaida.php" target="centro">Cadastrar Saída</a></li>
                            <li><a href="relatorioLivroCaixa.php" target="centro">Relatório Livro Caixa</a></li>
                           
                           
                        </ul>
                    </li>         
                </ul>
            </div><br><br>


            <div id="contents"><iframe width="929" height="385" name="centro" frameborder="0" >


<!--<p><img class="imagefloat" src="4.jpg" alt="" width="29600" height="100" border="0"></p><br><br> frameborder="0"-->                 
                </iframe>
                <a href="principal.php"><img src="../imagens/icones/home30.2.png" title="PÁGINA INICIAL" align="center"></a>&nbsp;&nbsp;|
                <?php
                if (($_SESSION['idperfil'])== 'Administrador') {
                    echo "<a href='controlarUsuario.php' target='centro'><img src='../imagens/icones/Cad.user30.png' title='CONTROLAR USUÁRIO' align='center'></a>&nbsp;&nbsp;| ";
                }
                ?><a href="principal.php"><img src="../imagens/icones/user30.png" title="USUÁRIO ATUAL"align="center"></a><?php echo $_SESSION['usuario']; ?>
                <img src="../imagens/icones/logout30.png" title="SAIR" align="right" onclick="conf()"/>


            </div>

            <script type='text/javascript'>
                function conf(){
                    if(confirm("Deseja mesmo Sair?")){
                       document.location.href="../controller/controllerLogoff.php"
                    }                    
                }    
                                    
                
            </script>

    </body>
</html>