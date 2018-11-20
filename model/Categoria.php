<?php

class Categoria {

    private $id;
    private $nome;
    private $status;
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getstatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setStatus($status) {
        $this->status = $status;
    }


}
