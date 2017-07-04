<html>
    <head>
        <meta charset="UTF-8">
        <?php include_once(getcwd() . '/View/includes/includes.html'); ?>

        <title>Evento: <?php echo $evento->getNome(); ?></title>
    </head>
    <body>
        <div class="container">
            <?php include_once(getcwd() . '/View/includes/header.php'); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 

                    <div class="page-header">
                        <h1><small>Detalhes do Evento</small></h1>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 

                    <div class="panel panel-default">
                        <div class="panel-body"><h2> Evento: <?php echo utf8_encode($evento->getNome()); ?></h2></div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12"> 
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6"> 
                                                    <img src="Files/<?php echo $evento->getImagem(); ?>"   class="img-rounded" style="width:100%"/>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6"> 
                                                    <h3>Local: <?php echo utf8_encode($evento->getLocal()); ?></h3>
                                                    
                                                    <h3>Horário do Evento: <?php echo substr($evento->getHoraInicio(),0,5); ?></h3>
                                                    
                                                    <h3>Descrição:</h3>
                                                    <?php echo utf8_encode($evento->getDescricao()); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col-lg-12 col-md-12 col-sm-12"> 
                                    <a class='btn btn-small btn-info' href="?controller=evento&action=listar&status=1">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>

