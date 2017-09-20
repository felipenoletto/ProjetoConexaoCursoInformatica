<?php

abstract class Conexao {

    public static function getInstance() {
        try {

            $pdo = new PDO("mysql:host=localhost;dbname=conexao", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?> 
