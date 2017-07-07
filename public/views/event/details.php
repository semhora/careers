<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <div style="width: 90%; height: 30px">
            <img src="<?= "../../../" . $event->getImg() ?>" height="300" />
        </div>

        <div style="margin-top: 300px">
            <?php
            if (!$event) {
                die("evento não encontrado");
            }
            ?>

            Nome: <?= $event->getName() ?>
            <br>

            Descrição: <?= $event->getDescription() ?>
            <br>

            Local: <?= $event->getLocality() ?>
            <br>

            Hora de inicio: <?= $event->getStartHour() ?>
            <br>

            Status: <?= $event->getStatus() ?>
            <br>
        </div>

    </body>
</html>