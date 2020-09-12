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
$fornecedores = $daoFornecedores->porId( $id_fornecedores );

if (! $fornecedores )
    header('Location: ./index.php');

else {  


    ob_start();

    ?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Fornecedores</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

                <form action="atualizar.php" method="POST">

                    <input type="hidden" name="id_fornecedores" 
                          value="<?php echo $fornecedores->getId(); ?>"> 

                    <div class="form-group">
                        <label for="Empresa">Nome da Empresa </label>
                        <input type="text" class="form-control" id="empresa"
                            value="<?php echo $fornecedores->getEmpresa(); ?>"
                            name="empresa" placeholder="Empresa" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipoenvio"> Tipo do Envio </label>
                            <input type="text" class="form-control" id="tipoenvio" 
                                value="<?php echo $fornecedores->getTipoenvio(); ?>"
                                name="tipoenvio" placeholder="Tipo de Envio" required>
                        </div>                            
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" 
                                value="<?php echo $fornecedores->getCidade(); ?>"
                                name="cidade" placeholder="Cidade" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_fornecedores">ID Fornecedor</label>
                            <input type="number" class="form-control" id="id_fornecedores" 
                                value="<?php echo $fornecedores->getId_fornecedores(); ?>"
                                name="id_fornecedores" placeholder="Id_fornecedores" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contato">Contato</label>
                            <input type="text" class="form-control" id="contato" 
                                value="<?php echo $fornecedores->getContato(); ?>"
                                name="contato" placeholder="Contato" required>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

                </form> 


            </div>
        </div>
    </div>
<?php


    $content = ob_get_clean();
    echo html( $content );
} // else-if

?>
