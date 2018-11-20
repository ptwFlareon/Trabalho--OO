

        <div class="container">

            <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
                <i class="glyphicon glyphicon-remove"></i> Logout</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>controle-produto/novo/">Novo Produto</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                <tbody>

                    <?php if ($this->getDados('produtos')): ?>
                        <?php $ar = $this->getDados('produtos'); ?>

                     <?php foreach ($ar as $categoria): ?>
                           <?php $categoria instanceof Produto; ?>
                                 
                            <tr><td><?= $categoria->getId() ?></td>
                            <td><?= $categoria->getNome() ?></td>
                            <td><?= $categoria->getValor() ?></td>
                            <td><?= $categoria->getStatus() ?></td>
                            <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-produto/excluir/<?= $categoria->getId() ?>">
                                    excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-produto/editar/<?= $categoria->getId() ?>">
                                    editar
                            </a>
                            </td></tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
                </thead>    
            </table>

        </div>
