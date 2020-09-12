<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Fornecedores.php');
require_once(__DIR__ . '/../../dao/DaoFornecedores.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoFornecedores = new Fornecedores($conn);
$fornecedores = $daoFornecedores->porId( $_POST['id'] );
    
if ( $fornecedores )
{  
  $fornecedores->setEmpresa( $_POST['empresa'] );
  $fornecedores->setTipoenvio( $_POST['tipoenvio'] );
  $fornecedores->setCidade( $_POST['cidade'] );
  $fornecedores->setId_fornecedores( $_POST['id_fornecedores'] );
  $fornecedores->setContato( $_POST['Contato'] );
  $daoFornecedores->atualizar( $fornecedores );
}

header('Location: ./index.php');