<?php

interface ILogin {
    public function validarLogin($usuario,$senha);
    
    public function listarMenuByIdPerfil($idPerfil);
}

?>
