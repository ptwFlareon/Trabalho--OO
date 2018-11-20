<?php

class Produto {

    private $id;
    private $nome;
    private $valor;
    private $status;
    private $categoria;


    public function __construct() {
//        $this->id = null;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
    function getCategoria() {
        return $this->categoria;
    }

    function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }
    
}