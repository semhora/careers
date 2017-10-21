<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="container">
    &nbsp;<h2>Evento</h2>
</div>
<div class="container">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <tr>
                <th>Nome </th>
                <td><?=$event->getName(); ?></td>
            </tr>
            <tr>
                <th>Descrição </th>
                <td><?=nl2br($event->getDescription()); ?></td>
            </tr>
            <tr>
                <th>Local </th>
                <td>
                    <a href="https://maps.google.com/?q=<?=$event->getLocal(); ?>" target="_blank">
                        <?=$event->getLocal(); ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Data e horário </th>
                <td><?=$event->getSchedule()->format('d/m/Y H:i');?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?=$event->getStatus() == \App\Entities\Event::STATUS_ACTIVE ? 'Ativo' : 'Inativo';?></td>
            </tr>
            <tr>
                <th>Imagem</th>
                <td>
                    <img src="<?=image($event->getImage());?>" alt="<?=$event->getName();?>" width="320" /><br />
                </td>
            </tr>
        </table>

        <div class="pull-right">
            <a href="javascript:history.back()" class="btn btn-info">Voltar</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
