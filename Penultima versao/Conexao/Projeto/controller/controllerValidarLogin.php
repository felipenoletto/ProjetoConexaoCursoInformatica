<?php

session_start();
require_once '../dao/loginDAO.php';

$usuario = $_POST['user'];
$senha = $_POST['senha'];

$loginDAO = new LoginDAO();
$rs = $loginDAO->validarLogin($usuario, $senha);

if (empty($rs)) {
    $msg = "usuario e/ou senha invalido";

    echo "<script>";
    echo "window.location='../view/login.php?msg={$msg}'";
    echo "</script>";
}

$_SESSION['usuario'] = $rs['nome'];
$_SESSION['idusuario'] = $rs['idusuario'];
$_SESSION['idperfil'] = $rs['perfil'];
echo "<script>";
echo "window.location='../view/principal.php'";
echo "</script>";
?>