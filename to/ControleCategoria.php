<?php

class ControleCategoria implements IPrivateTO {

    public function listaDeCategoria() {
        $dc = new DaoCategoria();
        $categoria = $dc->listarTodos();
        $v = new TGui("listaDeCategoria");
        $v->addDados("categoria", $categoria);
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $u = $dc->listar($p1);
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $u);
        $v->renderizar();
    }

    public function novo() {
        $c = new Categoria();
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $c);
        $v->renderizar();
    }

    public function salvar() {
        $cat = new Categoria();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $cat->setId($id);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }
        $status = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$status || trim($status) == "") {
            throw new Exception("O campo status é obrigatório!");
        }

        $cat->setNome($nome);
        $cat->setStatus($status);

        $dc = new DaoCategoria();
        $dc->salvar($cat);
        header("location: " . URL . "controle-categoria/lista-de-categoria");

    }

    public function excluir($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $c = $dc->listar($p1);
        $v = new TGui("confirmaExclusaoCategoria");
        $v->addDados("categoria", $c);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $dc = new DaoCategoria();
            $c = $dc->listar($id);
            if ($dc->excluir($c)) {
                header("location: " . URL . "controle-categoria/lista-de-categoria");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-categoria/lista-de-categoria");
        }
    }

}
