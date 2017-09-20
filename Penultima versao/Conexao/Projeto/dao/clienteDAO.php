<?php
require_once 'iCliente.php';
require_once 'conexao/conexao.php';

class clienteDAO implements iCliente {

    public function getAllCidadesByIdEstado($idEstado) {
        $pdo = Conexao::getInstance();
        $id = $idEstado;
        try {
            $sql = "SELECT * FROM cidade WHERE estado_idestado = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $cidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cidades;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllEstados() {
        $pdo = Conexao::getInstance();
        try {
            $sql = "SELECT * FROM estado";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $estados;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function salvar($cliente) {
        
        $nome = $cliente->getNome();
        $rg = $cliente->getRg();
        $cpf = $cliente->getCpf();
        $telefone = $cliente->getTelefone();
        $idcidade = $cliente->getIdcidade();
        $cep = $cliente->getCep();
        $endereco = $cliente->getEndereco();
        $email = $cliente->getEmail();
        $status = $cliente->getStatus();
        
        
        try {
            $pdo= Conexao::getInstance();
            
            $sql=  "INSERT INTO cliente (nome,rg,cpf,telefone,idcidade,cep,endereco,email,status)
            values (:nome,:rg,:cpf,:telefone,:idcidade,:cep,:endereco,:email,:status)";
            
            $stmt= $pdo->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":rg", $rg, PDO::PARAM_STR);
            $stmt->bindParam(":cpf", $cpf, PDO::PARAM_STR);
            $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            $stmt->bindParam(":idcidade", $idcidade, PDO::PARAM_INT);
            $stmt->bindParam(":cep", $cep, PDO::PARAM_STR);
            $stmt->bindParam(":endereco", $endereco, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            return $stmt->execute();
            
        }catch (PDOException $e) {
            echo "Erro ao Cadastrar o cliente", $e->getMessage();
            
        }
      
  }
    public function getAllcliente(){
         try {
            $pdo = Conexao::getInstance();
            //$sql = "SELECT * FROM cliente";
            $sql = " SELECT f.idcliente,f.nome,f.rg,f.cpf,f.telefone,c.nome as cidade, e.uf,f.cep, f.endereco, f.email, f.status
                     FROM cliente f
                     INNER JOIN cidade c ON (f.idcidade = c.idcidade)
                     INNER JOIN estado e ON (c.estado_idestado = e.idestado)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
     }
    public function deleteByIdcliente($id){
        
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM cliente WHERE idcliente = :idcliente ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idcliente", $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    
    public function getByIdcliente($idcliente){
     try {
         
         $pdo = Conexao::getInstance();
            
            $sql = " SELECT f.idcliente,f.nome,f.rg,f.cpf,f.telefone,c.idcidade,c.nome as cidade, e.idestado,e.uf,f.cep,f.endereco,f.email, f.status
                     FROM cliente f
                     INNER JOIN cidade c ON (f.idcidade = c.idcidade)
                     INNER JOIN estado e ON (c.estado_idestado = e.idestado) WHERE f.idcliente = :idcliente";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }
    
    public function updatecliente(clienteDTO $clienteDTO){
        
        try {
            $idcliente = $clienteDTO->getIdcliente();
            $nome = $clienteDTO->getNome();
            $rg = $clienteDTO->getRg();
            $cpf = $clienteDTO->getCpf();
            $telefone = $clienteDTO->getTelefone();
            $idcidade = $clienteDTO->getIdcidade();
            $cep = $clienteDTO->getCep();
            $endereco = $clienteDTO->getEndereco();
            $email = $clienteDTO->getEmail();
            

            $pdo = Conexao::getInstance();
            $sql = "UPDATE cliente SET 
                   nome=:nome,rg=:rg, cpf=:cpf, telefone=:telefone,idcidade=:idcidade, 
                   cep=:cep, endereco=:endereco,email=:email
                   WHERE idcliente = :idcliente";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":rg", $rg);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":idcidade", $idcidade);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":idcliente", $idcliente);

           return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    public function updateClienteStatus($status, $idcliente) {
      
        
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE cliente SET status=:status where idcliente=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $idcliente);
            
            return $stmt->execute();
            
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
        
        
    }
    public function getBynomecliente($pnome) {
         try {
            $nome = $pnome; 
            $pdo = Conexao::getInstance();
            $sql = " SELECT f.idcliente,f.nome,f.rg,f.cpf,f.telefone,c.nome as cidade, e.uf,f.cep, f.endereco, f.email, f.status
                     FROM cliente f
                     INNER JOIN cidade c ON (f.idcidade = c.idcidade)
                     INNER JOIN estado e ON (c.estado_idestado = e.idestado) HAVING nome like '%{$nome}%'";            
            $stmt = $pdo->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    
    }
    public function getBystatuscliente($pstatus) {
        try {
            $status = $pstatus; 
            $pdo = Conexao::getInstance();
            $sql = " SELECT f.idcliente,f.nome,f.rg,f.cpf,f.telefone,c.nome as cidade, e.uf,f.cep, f.endereco, f.email, f.status
                     FROM cliente f
                     INNER JOIN cidade c ON (f.idcidade = c.idcidade)
                     INNER JOIN estado e ON (c.estado_idestado = e.idestado) HAVING status like '{$status}%'";            
            $stmt = $pdo->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }
    public function getNomeByidCliente($idcliente) {
                 try {
            $idcliente = $idcliente; 
            $pdo = Conexao::getInstance();
            $sql = " SELECT nome
                     FROM cliente where idcliente = :idcliente";
                     
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs['nome'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }  
    }

}
?>