<h4>Deseja excluir o usuário <?php
    $emp = $this->getDados("usuario");
    if ($emp instanceof Usuario) {
        echo $emp->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-usuario/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($emp instanceof Usuario) {
        echo $emp->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-usuario/lista-de-usuario" >Não</a>
