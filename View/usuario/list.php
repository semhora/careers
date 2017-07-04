<html>
    <head>
        <meta charset="UTF-8">
        <?php include_once(getcwd() . '/View/includes/includes.html'); ?>

        <title>Listagem</title>
    </head>
    <body>
        <div class="container">
            <?php include_once(getcwd() . '/View/includes/header.php'); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 

                    <div class="page-header">
                        <h1><small>Lista de Usuários</small>
                            <?php
                            if ($_GET['status'] == 1) {
                                echo '&nbsp; <a class="btn btn-danger" href="?controller=usuario&action=listar&status=0">Visualizar Inativos</a>';
                            } else {
                                echo '&nbsp; <a class="btn btn-success" href="?controller=usuario&action=listar&status=1">Visualizar Ativos</a>';
                            }
                            ?>
                            &nbsp; <a class="btn btn-default" href="?controller=usuario&action=novo">Novo</a>
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
                                    <th>Email</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo utf8_encode($row['nome']); ?></td>
                                        <td><?php echo utf8_encode($row['email']); ?></td> 
                                        <td>
                                            <a class='btn btn-small btn-info' href="?controller=usuario&action=editar&id=<?php echo $row['id'] ?>">Editar</a>                                                                      
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

