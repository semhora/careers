<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12"> 

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sem Hora</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo PASTA .'/home'; ?>">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo PASTA .'/evento/listar/1'; ?>">Eventos</a></li>                                    
                        <?php if (isset($_SESSION['user']['id'])) { ?>
                            <li><a href="<?php echo PASTA .'/usuario/listar/1'; ?>">Usuários</a></li>
                        <?php } ?>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">                                 
                        <li class="dropdown">
                            <?php if (isset($_SESSION['user']['id'])) { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo utf8_encode($_SESSION['user']['nome']); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?controller=usuario&action=editar&id=<?php echo $_SESSION['user']['id'] ?>">Editar Dados</a></li>
                                    <li><a href="<?php echo PASTA .'/home/logout'; ?>">Sair</a></li>
                                </ul>
                            <?php } else { ?>
                                <a href="<?php echo PASTA .'/home/login'; ?>" class="dropdown-toggle">Login</a>                 
                            <?php } ?>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>