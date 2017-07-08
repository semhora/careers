<?php $this->layout('Layout/default') ?>
<?php $this->section('content') ?>
    <h1>Detalhes do evento</h1>
    <img src="/img/<?= $this->event['img'] ?>" alt="">
    <dl class="dl-horizontal">
        <dt>Nome:</dt>
        <dd><?= $this->event['name'] ?></dd>
        <dt>Descrição:</dt>
        <dd><?= $this->event['description'] ?></dd>
        <dt>Inicio:</dt>
        <dd><?= date('d/m/Y h:i', strtotime($this->event['begin_date_time'])) ?></dd>
        <dt>Local:</dt>
        <dd><?= $this->event['place'] ?></dd>
    </dl>
<?php $this->append() ?>
