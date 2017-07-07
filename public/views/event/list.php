<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data inicio</th>
                    <th>Opçoes</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($events as $event): ?>

                    <tr>
                        <td><?= $event->getName() ?></td>
                        <td><?= $event->getdescription() ?></td>
                        <td>
                            <a href="/event/details/<?= $event->getId() ?>">
                                Ver mais
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>