<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="col-md-3">
    &nbsp;
</div>
<div class="col-md-9">
    <h2>Usuários</h2>

    <div class="col-lg-8">
        <table class="table">
            <tr>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Data de cadastro</th>
            </tr>
            <?php if ( count($users) ): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=$user->getName();?></td>
                        <td><?=$user->getEmail();?></td>
                        <td><?=$user->getRegisteredAt()->format('d/m/Y');?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <hr />

        <div class="pull-right">
            <a href="javascript:history.back()" class="btn btn-info">Voltar</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
