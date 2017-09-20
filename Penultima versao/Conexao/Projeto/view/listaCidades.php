<?php

require_once '../dao/clienteDAO.php';

$idestado = $_GET['estado'];

if (!empty($_REQUEST['estado'])) {
    $clienteDAO = new clienteDAO();
    $cidades = $clienteDAO->getAllCidadesByIdEstado($idestado);

    foreach ($cidades as $cidade) {
        echo "<option value='{$cidade["idcidade"]}'>", utf8_encode($cidade["nome"]), "</option>";
    }
} else {
    echo "<option>Selecione o Estado</option>";
}
?>
