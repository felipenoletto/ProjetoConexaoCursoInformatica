<?php
require_once 'iUsuario.php';
require_once 'conexao/conexao.php';

class usuarioDAO implements iUsuario {
    
        public function salvar($usuario) {
            $nome = $usuario->getNome();
            $senha = md5($usuario->getSenha());
            $perfil = $usuario->getPerfil();
            $status = $usuario->getStatus();
            
            try {
                
                $pdo = Conexao::getInstance();
                $sql=  "INSERT INTO usuario (nome,senha,perfil,status)
            values (:nome,:senha,:perfil,:status)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
                $stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
                $stmt->bindParam(":perfil", $perfil, PDO::PARAM_STR);
                $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                return $stmt->execute();
        } catch (PDOException $e){
            echo "Erro ao Cadastrar o Usuario", $e->getMessage();
            
        }
}
        public function getAllUsuario() {
            try {
            $pdo = Conexao::getInstance();
            //$sql = "SELECT * FROM cliente";
            $sql = " SELECT idusuario, nome, perfil, status
                     FROM usuario";
                     
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
        }
        public function updateUsuarioStatus($status, $idusuario) {
             try {
                          
            $pdo = Conexao::getInstance();
            $sql = "UPDATE usuario SET status=:status WHERE idusuario=:idusuario";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":idusuario", $idusuario);
            
            return $stmt->execute();
            
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
        
        }
        public function getByIdUsuario($idusuario) {
         try {
         
         $pdo = Conexao::getInstance();
            
            $sql = " SELECT *
                     FROM usuario 
                    WHERE idusuario = :idusuario";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idusuario", $idusuario);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        }
}
?>