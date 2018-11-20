<?php

class DaoProduto implements IDao {

    public function excluir($u) {
        $sql = "delete FROM produto where id=:ID";
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
        
        $sql = "SELECT id, nome, valor, status, idcategoria FROM produto where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $pro = $sth->fetchObject("Produto");
        $dcat = new DaoCategoria();
        if ($pro->idcategoria){
            $cat = $cat->listar($pro->idcategoria);
            $pro->setCategoria($cat);
        }
        return $pro;
    }
    
    public function listarTodos() {
        $sql = "SELECT * FROM produto";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arPro = array();
        while ($pro = $sth->fetchObject("Produto")) {

            $arPro[] = $pro;
        }
        return $arPro;
    }

    public function salvar($u) {
        $nome = $u->getNome();
        $valor = $u->getValor();
        $status = $u->getStatus();
        $idcat = null;
        $categoria = $u->getCategoria();
        if($categoria instanceof Categoria){
            $idcat = $categoria->getId();
        }

        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update produto set nome=:nome, valor=:valor, status=:status,"
                    . "idcategoria=:categoria where id=:id";
        } else {
            $id = $this->generateID();
            $u->setId($id);
            $sql = "insert into produto(id, nome, valor, status, idcategoria) values "
                    . "(:id, :nome, :valor, :status, :idcategoria)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("valor", $valor);
        $sth->bindParam("status", $status);
        $sth->bindParam("idcategoria", $idcat); 
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    
    private function generateID() {
        $sql = "select (coalesce(max(id),0)+1) as ID from produto";
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $res = $sth->fetch();
        $id = $res['ID'];
        return $id;
    }

}
