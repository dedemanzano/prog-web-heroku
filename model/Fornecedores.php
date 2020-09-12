<?php

class Fornecedores {

private $empresa;
private $tipoenvio;
private $cidade;
private $id_fornecedores;
private $contato;

public function __construct(string $empresa='',string $tipoenvio = '',string $cidade = '',int $id_fornecedores =-1,string $contato='') {
    $this->empresa = $empresa;
    $this->tipoenvio = $tipoenvio;
    $this->cidade = $cidade;
    $this->id_fornecedores = $id_fornecedores;
    $this->contato = $contato;
}

public function setEmpresa(string $empresa){
    $this->empresa = $empresa;
}

public function getEmpresa(){
    return $this->Empresa;
}

public function setTipoenvio(string $tipoenvio){
    $this->tipoenvio = $tipoenvio;
}

public function getTipoenvio(){
    return $this->Tipoenvio;
}

public function setCidade(string $cidade){
    $this->cidade = $cidade;
}

public function getCidade(){
    return $this->cidade;
}

public function setId_fornecedores(int $id_fornecedores){
    $this->id_fornecedores = $id_fornecedores;
}

public function getId_fornecedores(){
    return $this->id_fornecedores;
}

public function setContato(string $Contato){
    $this->Contato = $Contato;
}

public function getContato(){
    return $this->contato;
}

};