<?php

require_once(__DIR__ . '/../../templates/template-html.php');

ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Fornecedores</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

        <form action="salvar.php" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="empresa">Nome da Empresa</label>
                        <input type="text" class="form-control" id="empresa"
                            name="empresa" placeholder="Empresa" required>
                    </div>

                        <div class="form-group col-md-6">
                            <label for="tipoenvio">Tipo do Envio</label>
                            <input type="text" class="form-control" id="tipoenvio" 
                                name="tipoenvio" placeholder="Tipo do Envio" required>
                        </div>  
                </div>   

                <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" 
                                name="cidade" placeholder="Cidade" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_fornecedores">ID Fornecedor</label>
                            <input type="number" class="form-control" id="id_fornecedores" 
                                name="id_fornecedores" placeholder="Id_fornecedores" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contato">Contato</label>
                            <input type="text" class="form-control" id="contato" 
                                name="contato" placeholder="Contato" required>
                        </div>

                </div>
                    

            <div class="input-group">
                <div class="input-group-append">

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
                
                </div>

            </div>

        </form> 


            </div>
        </div>
    </div>
<?php

$content = ob_get_clean();
echo html( $content );
    
?>


