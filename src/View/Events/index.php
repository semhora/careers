<?php $this->layout('Layout/default') ?>
<?php $this->section('content') ?>
<div class="jumbotron">
    <h1>
        Eventos
    </h1>
    <a href="/add">Adicionar evento</a>
</div>
<div class="list-group">
    <?php foreach ($this->events as $event) : ?>
        <a href="/details/<?= $event['id'] ?>" class="list-group-item ">
            <h4 class="list-group-item-heading"><?= $event['name'] ?></h4>
            <img src="/img/<?= $event['img'] ?>" alt="">
        </a>
    <?php endforeach; ?>
</div>
<?php $this->append() ?>
