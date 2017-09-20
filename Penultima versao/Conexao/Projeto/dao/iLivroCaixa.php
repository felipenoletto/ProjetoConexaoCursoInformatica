<?php
interface iLivroCaixa{

    public function salvar($livroCaixa);
    
    public function getAllLivroCaixa();
    
    public function salvarSaida($livroCaixaSaida);
    
    public function getByData($datainicial,$datafinal);
}
?>