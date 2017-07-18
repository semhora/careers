<html>
    <head>
        <meta charset="UTF-8">
        <?php include_once(getcwd() . '/View/includes/includes.php'); ?>

        <title>Listagem</title>
    </head>
    <body>
        <div class="container">
            <?php include_once(getcwd() . '/View/includes/header.php'); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 

                    <div class="page-header">
                        <h1><small>Lista de Eventos</small>
                            <?php
                            if (isset($_SESSION['user']['id'])) {
                                if ($_GET['status'] == 1) {
                                    echo '&nbsp; <a class="btn btn-danger" href="'.PASTA .'/evento/listar/0">Visualizar Inativos</a>';
                                } else {
                                    echo '&nbsp; <a class="btn btn-success" href="'.PASTA .'/evento/listar/1">Visualizar Ativos</a>';
                                }
                                echo '&nbsp; <a class="btn btn-default" href="'.PASTA .'/evento/novo">Novo</a>';
                            }
                            ?>

                        </h1>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 
                    <?php
                    if (isset($_GET['msg'])) {
                        ?>
                        <div class="alert alert-success">
                            <?php echo $_GET['msg']; ?>
                        </div>

                        <?php
                    }
                    ?>


                    <form method="POST" action="">
                        <table width="100%" class="table table-stripped table-hover table-border">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Imagem</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo utf8_encode($row['nome']); ?></td>
                                        <td><?php echo utf8_encode(substr($row['descricao'], 0, 65) . '...'); ?></td>
                                        <td><img src="<?php echo PASTA .'/Files/'.$row['imagem']; ?>"   class="img-rounded" height="120" width="120"/></td>
                                        <td>
                                            <a class='btn btn-small btn-success' href="<?php echo PASTA .'/evento/visualizar/'.$row['id']; ?>">Ver Detalhes</a>

                                            <?php if (isset($_SESSION['user']['id'])) { ?>
                                                <a class='btn btn-small btn-info' href="<?php echo PASTA .'/evento/editar/'.$row['id']; ?>">Editar</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
    </body>
</html>

