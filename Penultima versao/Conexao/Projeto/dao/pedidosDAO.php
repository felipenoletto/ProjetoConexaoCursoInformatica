<?PHP
require_once 'iPedidos.php';
require_once 'conexao/conexao.php';

class pedidoDAO implements iPedidos{
    public function salvar($pedido) {
        $idusuario= $_SESSION['idusuario'];
        $idcliente= $pedido->getIdCliente();
        $valorPedido= $pedido->getValorPedido();
        $dataPedido=$pedido->getDataPedido();
        $descPedido= $pedido->getDescPedido();
        $status=$pedido->getStatus();
        $estado=$pedido->getEstado();
        
         try {
            $pdo= Conexao::getInstance();
            
            $sql=  "INSERT INTO pedidos (idusuario,idcliente,valor_pedido,data_pedido,desc_pedido,status,estado)
            values (:idusuario,:idcliente,:valorPedido,:dataPedido,:descPedido,:status,:estado)";
            
            $stmt= $pdo->prepare($sql);
            $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);
            $stmt->bindParam(":idcliente", $idcliente, PDO::PARAM_STR);
            $stmt->bindParam(":valorPedido", $valorPedido, PDO::PARAM_STR);
            $stmt->bindParam(":dataPedido", $dataPedido, PDO::PARAM_STR);
            $stmt->bindParam(":descPedido", $descPedido, PDO::PARAM_STR);
            $stmt->bindParam(":status", $status, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            return $stmt->execute();
            
        }catch (PDOException $e) {
            echo "Erro ao Cadastrar o Pedido", $e->getMessage();
            
        }
        
    }
    public function getAllPedido() {
        try {
            $estado='aberto';
            $pdo = Conexao::getInstance();
            //$sql = "SELECT * FROM cliente";
            $sql = " SELECT idpedidos, idusuario, idcliente, valor_pedido, data_pedido, desc_pedido, status
                     FROM pedidos where estado=:estado
                     ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":estado", $estado,PDO::PARAM_STR);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage;
        }
 
    }
    public function updatePedido($pedido, $idpedidos) {
        try {
        $idpedidos= $pedido->getIdPedido();
        $idcliente= $pedido->getIdCliente();
        $valor_pedido= $pedido->getValorPedido();
        $desc_pedido= $pedido->getDescPedido();



            $pdo = Conexao::getInstance();
            $sql = "UPDATE pedidos SET 
                   idcliente=:idcliente,valor_pedido=:valor_pedido, desc_pedido=:desc_pedido
                   WHERE idpedidos = :idpedidos";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idpedidos", $idpedidos);
            $stmt->bindParam(":idcliente", $idcliente);
            $stmt->bindParam(":valor_pedido", $valor_pedido);
            $stmt->bindParam(":desc_pedido", $desc_pedido);

            
           return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getByIdPedido($idpedidos) {
        try {
         
         $pdo = Conexao::getInstance();
            
            $sql = " SELECT idpedidos, idcliente, valor_pedido, data_pedido, desc_pedido, status
                     FROM pedidos 
                    WHERE idpedidos = :idpedidos";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idpedidos", $idpedidos);
            $stmt->execute();
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function updatePedidoStatus($status, $idpedidos) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE pedidos SET status=:status where idpedidos=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $idpedidos);
            
            return $stmt->execute();
            
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }
    public function getBystatuspedido($pstatus) {
        try {
            $status = $pstatus; 
            $pdo = Conexao::getInstance();
            $sql = " SELECT idpedidos, idusuario, idcliente, valor_pedido, data_pedido, desc_pedido, status
                     FROM pedidos
                      HAVING status like '{$status}%'";            
            $stmt = $pdo->query($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }

    
}
?>
