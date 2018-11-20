<div class="container">
    <?php
    $id = "";
    $nome = "";
    $status = "";

    $categoria = $this->getDados("categoria");
    if ($categoria) {
        $categoria instanceof Categoria;
        $id = $categoria->getId();
        $nome = $categoria->getNome();
        $status = $categoria->getStatus();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-categoria/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Nome</label><br>
        <input class="form-control" type="text" value="<?php echo $nome; ?>" name="nome"><br>
       
        <select class="form-control" name="status">
            <option value="A" <?php
            if ($categoria == 'A') {
                echo 'selected="true"';
            }
            ?>>Ativo</option>
            <option value="I" <?php
            if ($categoria == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>
        
        <hr/>
        <hr/>
        
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-categoria/lista-de-categoria">voltar</a><br>
    </form>
</div>

<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>