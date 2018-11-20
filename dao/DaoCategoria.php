<?php

class DaoCategoria implements IDao {

    public function excluir($u) {
        $sql = "delete FROM categoria where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getId();
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function listar($p1) {
        $sql = "SELECT * FROM categoria where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Categoria");
        return $usu;
    }

    public function listarTodos() {
        $sql = "SELECT * FROM categoria";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Categoria")) {

            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    public function salvar($u) {
        $nome = $u->getNome();
        $status = $u->getStatus();

        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update categoria set nome=:nome, status=:status where id=:id";
        } else {
            $id = 0;
            $sql = "insert into categoria(id, nome, status) values "
                    . "(:id, :nome, :status)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("status", $status);
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}
