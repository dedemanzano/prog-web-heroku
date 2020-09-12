<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Fornecedores.php');
require_once(__DIR__ . '/../../dao/DaoFornecedores.php');
require_once(__DIR__ . '/../../config/config.php');


$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoFornecedores = new DaoFornecedores($conn);
$fornecedores = $daoFornecedores->porId( $_POST['empresa'], $_POST['tipoenvio'], $_POST['cidade'], $_POST['id_fornecedores'],$_POST['contato'] );

    
header('Location: ./index.php');

?>


