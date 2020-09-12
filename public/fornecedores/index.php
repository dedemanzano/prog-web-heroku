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

$daoFornecedores = new DaoFornecedores($conn);
$fornecedores = $daoFornecedores->todos();

ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Fornecedores</h2>
        </div>
        <div class="row mb-2">
            <div class="col-md-12" >
                <a href="novo.php" class="btn btn-primary active" role="button" aria-pressed="true">Novo Fornecedor</a>
            </div>
        </div>

<?php 
    if (count($fornecedores) >0) 
    {
?>
        <div class="row">
            <div class="col-md-12" >

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Tipo de Envio</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Id Fornecedor</th>
                        <th scope="col">Contato</th>
                    </tr>
                </thead>
                <tbody>
<?php 
        foreach($fornecedores as $f) {
?>                    
                    <tr>
                        <th scope="row"><?php echo  $f->getId(); ?></th>
                        <td><?php echo $f->getEmpresa(); ?></td>
                        <td><?php echo $f->getTipoenvio(); ?></td>
                        <td><?php echo $f->getCidade(); ?></td>
                        <td><?php echo $f->getId_fornecedores(); ?></td>
                        <td><?php echo $f->getContato(); ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm active" 
                                href="apagar.php?id=<?php echo $p->getId();?>">
                                Apagar
                            </a>
                            <a class="btn btn-secondary btn-sm active" 
                                href="editar.php?id=<?php echo $p->getId();?>">
                                Editar
                            </a>                        
                        </td>
                    </tr>
<?php
        } // foreach
?>                    
                </tbody>
                </table>

            </div>
        </div>
<?php 
    
    }  // if 
?>        
    </div>
<?php

$content = ob_get_clean();
echo html( $content );
    
?>


