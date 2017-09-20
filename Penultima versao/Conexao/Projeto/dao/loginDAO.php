<?php

require_once 'iLogin.php';
require_once 'conexao/conexao.php';

class LoginDAO implements ILogin {

    public function validarLogin($usuario, $senha) {
        try {

            $nome = $usuario;
            $pass = md5($senha);
            
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario WHERE nome = :nome AND senha = :senha";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":senha", $pass);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs;
            
        } catch (PDOException $e) {
            echo "Erro ao validar o login ", $e->getMessage();
        }
    }

    public function listarMenuByIdPerfil($perfil) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT perfil FROM usuario ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":perfil", $Perfil);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>