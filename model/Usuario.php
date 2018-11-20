<?php

class Usuario {

    private $id;
    private $nome;
    private $login;
    private $senha;
    
    /**
     *
     * @var Empresa 
     * 
     */
    private $empresa;

    /**
     *
     * @var String status do usuário
     */
    private $status;
    private $thumbnail_path;

    public function __construct() {
//        $this->id = null;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
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

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    function getThumbnail_path() {
        return $this->thumbnail_path;
    }

    function setThumbnail_path($thumbnail_path) {
        $this->thumbnail_path = $thumbnail_path;
    }
    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa(Empresa $empresa) {
        $this->empresa = $empresa;
    }
    
}