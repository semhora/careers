<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="container">
    &nbsp;<h2>Eventos</h2>
</div>
<div class="container">
    <div class="col-lg-12">
        <?php
        if (count($events)) {
            foreach ($events as $event) {
                /** @var \App\Entities\Event $event */
                ?>
                <div class="col-md-6">
                    <hr />
                    <span><strong>Nome: </strong></span> <a href="<?=getUrl('event_specifc', ['id' => $event->getId()]);?>"><?=$event->getName(); ?></a><br />
                    <img src="<?=image($event->getImage()); ?>" width="180" alt="<?=$event->getName();?>" />
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
