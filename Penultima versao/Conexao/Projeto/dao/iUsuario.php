<?php
interface iUsuario{

    public function salvar($usuario);
    
    public function getAllUsuario();
    
    public function updateUsuarioStatus($status, $id);
    
    public function getByIdUsuario($id);
}
?>